<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query = Employee::with('department');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->search . '%')
                  ->orWhere('last_name', 'like', '%' . $request->search . '%')
                  ->orWhere('employee_number', 'like', '%' . $request->search . '%');
            });
        }

        $employees = $query->paginate(5)->withQueryString();
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('employees.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_number' => 'required|unique:employees|max:255',
            'first_name'      => 'required|max:255',
            'last_name'       => 'required|max:255',
            'email'           => 'required|email|unique:employees|max:255',
            'position'        => 'required|max:255',
            'department_id'   => 'required|exists:departments,id',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();
        return view('employees.edit', compact('employee', 'departments'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'employee_number' => 'required|unique:employees,employee_number,' . $employee->id . '|max:255',
            'first_name'      => 'required|max:255',
            'last_name'       => 'required|max:255',
            'email'           => 'required|email|unique:employees,email,' . $employee->id . '|max:255',
            'position'        => 'required|max:255',
            'department_id'   => 'required|exists:departments,id',
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
