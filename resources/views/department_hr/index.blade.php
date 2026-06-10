<!DOCTYPE html>
<html>

<head>
    <title>HR Officers</title>
</head>

<body>
    <h1>HR Officers</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="GET" action="{{ route('department-hr.index') }}">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or email...">
        <button type="submit">Search</button>
        <a href="{{ route('department-hr.index') }}">Clear</a>
    </form>

    <br>
    <a href="{{ route('department-hr.create') }}">Add HR Officer</a>

    <table border="1">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Actions</th>
        </tr>
        @foreach($hrOfficers as $hr)
            <tr>
                <td>{{ $hr->first_name }}</td>
                <td>{{ $hr->last_name }}</td>
                <td>{{ $hr->email }}</td>
                <td>{{ $hr->department->name }}</td>
                <td>
                    <a href="{{ route('department-hr.edit', $hr) }}">Edit</a>
                    <form method="POST" action="{{ route('department-hr.destroy', $hr) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $hrOfficers->links() }}

</body>

</html>