<!DOCTYPE html>
<html>

<head>
    <title>Departments</title>
</head>

<body>
    <h1>Departments</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="GET" action="{{ route('departments.index') }}">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search department...">
        <button type="submit">Search</button>
        <a href="{{ route('departments.index') }}">Clear</a>
    </form>

    <br>
    <a href="{{ route('departments.create') }}">Add Department</a>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        @foreach($departments as $department)
            <tr>
                <td>{{ $department->id }}</td>
                <td>{{ $department->name }}</td>
                <td>
                    <a href="{{ route('departments.edit', $department) }}">Edit</a>
                    <form method="POST" action="{{ route('departments.destroy', $department) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $departments->links() }}

</body>

</html>