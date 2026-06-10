<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\Employee;
use App\Models\LeaveType;
use App\Models\DepartmentHr;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = LeaveRequest::with(['employee', 'leaveType', 'hrOfficer']);

        if ($request->filled('search')) {
            $query->whereHas('employee', function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->search . '%')
                  ->orWhere('last_name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $leaveRequests = $query->latest()->paginate(10)->withQueryString();
        return view('leave_requests.index', compact('leaveRequests'));
    }

    public function create()
    {
        $employees  = Employee::all();
        $leaveTypes = LeaveType::all();
        return view('leave_requests.create', compact('employees', 'leaveTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id'   => 'required|exists:employees,id',
            'leave_type_id' => 'required|exists:leave_types,id',
            'start_date'    => 'required|date',
            'end_date'      => 'required|date|after_or_equal:start_date',
            'reason'        => 'required|max:1000',
        ]);

        LeaveRequest::create([
            'employee_id'   => $request->employee_id,
            'leave_type_id' => $request->leave_type_id,
            'start_date'    => $request->start_date,
            'end_date'      => $request->end_date,
            'reason'        => $request->reason,
            'status'        => 'pending',
        ]);

        return redirect()->route('leave-requests.index')->with('success', 'Leave request submitted successfully.');
    }

    public function edit(LeaveRequest $leaveRequest)
    {
        $hrOfficers = DepartmentHr::all();
        return view('leave_requests.edit', compact('leaveRequest', 'hrOfficers'));
    }

    public function update(Request $request, LeaveRequest $leaveRequest)
    {
        $request->validate([
            'status'        => 'required|in:pending,approved,rejected',
            'hr_officer_id' => 'required|exists:department_hr,id',
        ]);

        $leaveRequest->update([
            'status'        => $request->status,
            'hr_officer_id' => $request->hr_officer_id,
            'approved_at'   => now(),
        ]);

        return redirect()->route('leave-requests.index')->with('success', 'Leave request updated successfully.');
    }

    public function destroy(LeaveRequest $leaveRequest)
    {
        $leaveRequest->delete();
        return redirect()->route('leave-requests.index')->with('success', 'Leave request deleted.');
    }
}
