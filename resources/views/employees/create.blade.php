<!DOCTYPE html>
<html>

<head>
    <title>Add Employee</title>
</head>

<body>
    <h1>Add Employee</h1>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('employees.store') }}">
        @csrf
        <div>
            <label>Employee Number</label>
            <input type="text" name="employee_number" value="{{ old('employee_number') }}">
        </div>
        <div>
            <label>First Name</label>
            <input type="text" name="first_name" value="{{ old('first_name') }}">
        </div>
        <div>
            <label>Last Name</label>
            <input type="text" name="last_name" value="{{ old('last_name') }}">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>
        <div>
            <label>Position</label>
            <input type="text" name="position" value="{{ old('position') }}">
        </div>
        <div>
            <label>Department</label>
            <select name="department_id">
                <option value="">-- Select Department --</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit">Save</button>
        <a href="{{ route('employees.index') }}">Cancel</a>
    </form>
</body>

</html>