<!DOCTYPE html>
<html>

<head>
    <title>Employees</title>
</head>

<body>
    <h1>Employees</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="GET" action="{{ route('employees.index') }}">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or ID...">
        <button type="submit">Search</button>
        <a href="{{ route('employees.index') }}">Clear</a>
    </form>

    <br>
    <a href="{{ route('employees.create') }}">Add Employee</a>

    <table border="1">
        <tr>
            <th>ID Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Position</th>
            <th>Department</th>
            <th>Actions</th>
        </tr>
        @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->employee_number }}</td>
                <td>{{ $employee->first_name }}</td>
                <td>{{ $employee->last_name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->position }}</td>
                <td>{{ $employee->department->name }}</td>
                <td>
                    <a href="{{ route('employees.edit', $employee) }}">Edit</a>
                    <form method="POST" action="{{ route('employees.destroy', $employee) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $employees->links() }}

</body>

</html>