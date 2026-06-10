<!DOCTYPE html>
<html>

<head>
    <title>Edit Employee</title>
</head>

<body>
    <h1>Edit Employee</h1>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('employees.update', $employee) }}">
        @csrf
        @method('PUT')
        <div>
            <label>Employee Number</label>
            <input type="text" name="employee_number" value="{{ old('employee_number', $employee->employee_number) }}">
        </div>
        <div>
            <label>First Name</label>
            <input type="text" name="first_name" value="{{ old('first_name', $employee->first_name) }}">
        </div>
        <div>
            <label>Last Name</label>
            <input type="text" name="last_name" value="{{ old('last_name', $employee->last_name) }}">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $employee->email) }}">
        </div>
        <div>
            <label>Position</label>
            <input type="text" name="position" value="{{ old('position', $employee->position) }}">
        </div>
        <div>
            <label>Department</label>
            <select name="department_id">
                <option value="">-- Select Department --</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ old('department_id', $employee->department_id) == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit">Update</button>
        <a href="{{ route('employees.index') }}">Cancel</a>
    </form>
</body>

</html>