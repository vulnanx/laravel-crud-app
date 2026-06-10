<!DOCTYPE html>
<html>
<head>
    <title>Leave Types</title>
</head>
<body>
    <h1>Leave Types</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="GET" action="{{ route('leave-types.index') }}">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search leave type...">
        <button type="submit">Search</button>
        <a href="{{ route('leave-types.index') }}">Clear</a>
    </form>

    <br>
    <a href="{{ route('leave-types.create') }}">Add Leave Type</a>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Max Days</th>
            <th>Actions</th>
        </tr>
        @foreach($leaveTypes as $leaveType)
        <tr>
            <td>{{ $leaveType->name }}</td>
            <td>{{ $leaveType->max_days }}</td>
            <td>
                <a href="{{ route('leave-types.edit', $leaveType) }}">Edit</a>
                <form method="POST" action="{{ route('leave-types.destroy', $leaveType) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $leaveTypes->links() }}

</body>
</html>
