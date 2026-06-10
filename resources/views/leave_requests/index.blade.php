<!DOCTYPE html>
<html>
<head>
    <title>Leave Requests</title>
</head>
<body>
    <h1>Leave Requests</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="GET" action="{{ route('leave-requests.index') }}">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by employee name...">
        <select name="status">
            <option value="">-- All Statuses --</option>
            <option value="pending"  {{ request('status') == 'pending'  ? 'selected' : '' }}>Pending</option>
            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved</option>
            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
        </select>
        <button type="submit">Filter</button>
        <a href="{{ route('leave-requests.index') }}">Clear</a>
    </form>

    <br>
    <a href="{{ route('leave-requests.create') }}">File Leave Request</a>

    <table border="1">
        <tr>
            <th>Employee</th>
            <th>Leave Type</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Reason</th>
            <th>Status</th>
            <th>Approved By</th>
            <th>Approved At</th>
            <th>Actions</th>
        </tr>
        @foreach($leaveRequests as $request)
        <tr>
            <td>{{ $request->employee->first_name }} {{ $request->employee->last_name }}</td>
            <td>{{ $request->leaveType->name }}</td>
            <td>{{ $request->start_date->format('Y-m-d') }}</td>
            <td>{{ $request->end_date->format('Y-m-d') }}</td>
            <td>{{ $request->reason }}</td>
            <td>{{ ucfirst($request->status) }}</td>
            <td>{{ $request->hrOfficer ? $request->hrOfficer->first_name . ' ' . $request->hrOfficer->last_name : '-' }}</td>
            <td>{{ $request->approved_at ? $request->approved_at->format('Y-m-d H:i') : '-' }}</td>
            <td>
                @if($request->status === 'pending')
                    <a href="{{ route('leave-requests.edit', $request) }}">Review</a>
                @endif
                <form method="POST" action="{{ route('leave-requests.destroy', $request) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {{ $leaveRequests->links() }}

</body>
</html>
