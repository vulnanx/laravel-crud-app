<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    public function index(Request $request)
    {
        $query = LeaveType::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $leaveTypes = $query->paginate(5)->withQueryString();
        return view('leave_types.index', compact('leaveTypes'));
    }

    public function create()
    {
        return view('leave_types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|unique:leave_types|max:255',
            'max_days' => 'required|integer|min:1',
        ]);

        LeaveType::create($request->all());
        return redirect()->route('leave-types.index')->with('success', 'Leave type created successfully.');
    }

    public function edit(LeaveType $leaveType)
    {
        return view('leave_types.edit', compact('leaveType'));
    }

    public function update(Request $request, LeaveType $leaveType)
    {
        $request->validate([
            'name'     => 'required|unique:leave_types,name,' . $leaveType->id . '|max:255',
            'max_days' => 'required|integer|min:1',
        ]);

        $leaveType->update($request->all());
        return redirect()->route('leave-types.index')->with('success', 'Leave type updated successfully.');
    }

    public function destroy(LeaveType $leaveType)
    {
        $leaveType->delete();
        return redirect()->route('leave-types.index')->with('success', 'Leave type deleted successfully.');
    }
}
