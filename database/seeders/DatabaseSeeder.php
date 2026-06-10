<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Employee;
use App\Models\DepartmentHr;
use App\Models\LeaveType;
use App\Models\LeaveRequest;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Departments
        $departments = [
            ['name' => 'Human Resources'],
            ['name' => 'Information Technology'],
            ['name' => 'Finance'],
            ['name' => 'Operations'],
            ['name' => 'Marketing'],
        ];

        foreach ($departments as $dept) {
            Department::create($dept);
        }

        $hr   = Department::where('name', 'Human Resources')->first();
        $it   = Department::where('name', 'Information Technology')->first();
        $fin  = Department::where('name', 'Finance')->first();
        $ops  = Department::where('name', 'Operations')->first();
        $mkt  = Department::where('name', 'Marketing')->first();

        // 2. Employees
        $employees = [
            ['employee_number' => 'EMP-001', 'first_name' => 'Juan',    'last_name' => 'dela Cruz',  'email' => 'juan.delacruz@company.com',  'position' => 'HR Specialist',       'department_id' => $hr->id],
            ['employee_number' => 'EMP-002', 'first_name' => 'Maria',   'last_name' => 'Santos',     'email' => 'maria.santos@company.com',   'position' => 'Software Engineer',   'department_id' => $it->id],
            ['employee_number' => 'EMP-003', 'first_name' => 'Pedro',   'last_name' => 'Reyes',      'email' => 'pedro.reyes@company.com',    'position' => 'Accountant',          'department_id' => $fin->id],
            ['employee_number' => 'EMP-004', 'first_name' => 'Ana',     'last_name' => 'Garcia',     'email' => 'ana.garcia@company.com',     'position' => 'Operations Manager',  'department_id' => $ops->id],
            ['employee_number' => 'EMP-005', 'first_name' => 'Carlos',  'last_name' => 'Mendoza',    'email' => 'carlos.mendoza@company.com', 'position' => 'Marketing Analyst',   'department_id' => $mkt->id],
            ['employee_number' => 'EMP-006', 'first_name' => 'Lisa',    'last_name' => 'Tan',        'email' => 'lisa.tan@company.com',       'position' => 'Full Stack Developer','department_id' => $it->id],
            ['employee_number' => 'EMP-007', 'first_name' => 'Miguel',  'last_name' => 'Aquino',     'email' => 'miguel.aquino@company.com',  'position' => 'Finance Officer',     'department_id' => $fin->id],
            ['employee_number' => 'EMP-008', 'first_name' => 'Sofia',   'last_name' => 'Lim',        'email' => 'sofia.lim@company.com',      'position' => 'Content Writer',      'department_id' => $mkt->id],
        ];

        foreach ($employees as $emp) {
            Employee::create($emp);
        }

        // 3. HR Officers (one per department)
        $hrOfficers = [
            ['first_name' => 'Rosa',    'last_name' => 'Villanueva', 'email' => 'rosa.hr@company.com',    'department_id' => $hr->id],
            ['first_name' => 'Bernard', 'last_name' => 'Cruz',       'email' => 'bernard.hr@company.com', 'department_id' => $it->id],
            ['first_name' => 'Elena',   'last_name' => 'Bautista',   'email' => 'elena.hr@company.com',   'department_id' => $fin->id],
            ['first_name' => 'Ramon',   'last_name' => 'Flores',     'email' => 'ramon.hr@company.com',   'department_id' => $ops->id],
            ['first_name' => 'Carla',   'last_name' => 'Navarro',    'email' => 'carla.hr@company.com',   'department_id' => $mkt->id],
        ];

        foreach ($hrOfficers as $officer) {
            DepartmentHr::create($officer);
        }

        // 4. Leave Types
        $leaveTypes = [
            ['name' => 'Sick Leave',      'max_days' => 10],
            ['name' => 'Vacation Leave',  'max_days' => 15],
            ['name' => 'Emergency Leave', 'max_days' => 3],
            ['name' => 'Maternity Leave', 'max_days' => 105],
            ['name' => 'Paternity Leave', 'max_days' => 7],
        ];

        foreach ($leaveTypes as $type) {
            LeaveType::create($type);
        }

        $sick      = LeaveType::where('name', 'Sick Leave')->first();
        $vacation  = LeaveType::where('name', 'Vacation Leave')->first();
        $emergency = LeaveType::where('name', 'Emergency Leave')->first();

        $emp1 = Employee::where('employee_number', 'EMP-001')->first();
        $emp2 = Employee::where('employee_number', 'EMP-002')->first();
        $emp3 = Employee::where('employee_number', 'EMP-003')->first();
        $emp4 = Employee::where('employee_number', 'EMP-004')->first();
        $emp5 = Employee::where('employee_number', 'EMP-005')->first();

        $hrIT  = DepartmentHr::where('email', 'bernard.hr@company.com')->first();
        $hrFin = DepartmentHr::where('email', 'elena.hr@company.com')->first();

        // 5. Leave Requests
        LeaveRequest::create([
            'employee_id'   => $emp2->id,
            'leave_type_id' => $sick->id,
            'start_date'    => '2026-06-12',
            'end_date'      => '2026-06-13',
            'reason'        => 'Fever and flu symptoms.',
            'status'        => 'approved',
            'hr_officer_id' => $hrIT->id,
            'approved_at'   => now(),
        ]);

        LeaveRequest::create([
            'employee_id'   => $emp3->id,
            'leave_type_id' => $vacation->id,
            'start_date'    => '2026-06-20',
            'end_date'      => '2026-06-27',
            'reason'        => 'Family vacation abroad.',
            'status'        => 'pending',
        ]);

        LeaveRequest::create([
            'employee_id'   => $emp1->id,
            'leave_type_id' => $emergency->id,
            'start_date'    => '2026-06-11',
            'end_date'      => '2026-06-11',
            'reason'        => 'Family emergency.',
            'status'        => 'rejected',
            'hr_officer_id' => $hrIT->id,
            'approved_at'   => now(),
        ]);

        LeaveRequest::create([
            'employee_id'   => $emp4->id,
            'leave_type_id' => $sick->id,
            'start_date'    => '2026-06-15',
            'end_date'      => '2026-06-16',
            'reason'        => 'Medical check-up.',
            'status'        => 'pending',
        ]);

        LeaveRequest::create([
            'employee_id'   => $emp5->id,
            'leave_type_id' => $vacation->id,
            'start_date'    => '2026-07-01',
            'end_date'      => '2026-07-05',
            'reason'        => 'Annual leave.',
            'status'        => 'approved',
            'hr_officer_id' => $hrFin->id,
            'approved_at'   => now(),
        ]);
    }
}
