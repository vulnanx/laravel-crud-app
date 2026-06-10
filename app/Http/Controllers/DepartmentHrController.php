<?php

namespace App\Http\Controllers;

use App\Models\DepartmentHr;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentHrController extends Controller
{
    public function index(Request $request)
    {
        $query = DepartmentHr::with('department');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->search . '%')
                  ->orWhere('last_name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        $hrOfficers = $query->paginate(5)->withQueryString();
        return view('department_hr.index', compact('hrOfficers'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('department_hr.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'email'         => 'required|email|unique:department_hr|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        DepartmentHr::create($request->all());
        return redirect()->route('department-hr.index')->with('success', 'HR Officer created successfully.');
    }

    public function edit(DepartmentHr $departmentHr)
    {
        $departments = Department::all();
        return view('department_hr.edit', compact('departmentHr', 'departments'));
    }

    public function update(Request $request, DepartmentHr $departmentHr)
    {
        $request->validate([
            'first_name'    => 'required|max:255',
            'last_name'     => 'required|max:255',
            'email'         => 'required|email|unique:department_hr,email,' . $departmentHr->id . '|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        $departmentHr->update($request->all());
        return redirect()->route('department-hr.index')->with('success', 'HR Officer updated successfully.');
    }

    public function destroy(DepartmentHr $departmentHr)
    {
        $departmentHr->delete();
        return redirect()->route('department-hr.index')->with('success', 'HR Officer deleted successfully.');
    }
}
