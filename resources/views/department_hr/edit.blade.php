<!DOCTYPE html>
<html>

<head>
    <title>Edit HR Officer</title>
</head>

<body>
    <h1>Edit HR Officer</h1>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('department-hr.update', $departmentHr) }}">
        @csrf
        @method('PUT')
        <div>
            <label>First Name</label>
            <input type="text" name="first_name" value="{{ old('first_name', $departmentHr->first_name) }}">
        </div>
        <div>
            <label>Last Name</label>
            <input type="text" name="last_name" value="{{ old('last_name', $departmentHr->last_name) }}">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $departmentHr->email) }}">
        </div>
        <div>
            <label>Department</label>
            <select name="department_id">
                <option value="">-- Select Department --</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}" {{ old('department_id', $departmentHr->department_id) == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit">Update</button>
        <a href="{{ route('department-hr.index') }}">Cancel</a>
    </form>
</body>

</html>