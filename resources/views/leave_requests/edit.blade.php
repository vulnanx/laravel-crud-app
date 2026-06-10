<!DOCTYPE html>
<html>
<head>
    <title>Review Leave Request</title>
</head>
<body>
    <h1>Review Leave Request</h1>

    <table border="1">
        <tr><th>Employee</th><td>{{ $leaveRequest->employee->first_name }} {{ $leaveRequest->employee->last_name }}</td></tr>
        <tr><th>Leave Type</th><td>{{ $leaveRequest->leaveType->name }}</td></tr>
        <tr><th>Start Date</th><td>{{ $leaveRequest->start_date->format('Y-m-d') }}</td></tr>
        <tr><th>End Date</th><td>{{ $leaveRequest->end_date->format('Y-m-d') }}</td></tr>
        <tr><th>Reason</th><td>{{ $leaveRequest->reason }}</td></tr>
        <tr><th>Current Status</th><td>{{ ucfirst($leaveRequest->status) }}</td></tr>
    </table>

    <br>
    <h2>HR Decision</h2>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('leave-requests.update', $leaveRequest) }}">
        @csrf
        @method('PUT')
        <div>
            <label>Decision</label>
            <select name="status">
                <option value="pending"  {{ old('status', $leaveRequest->status) == 'pending'  ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ old('status', $leaveRequest->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ old('status', $leaveRequest->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>
        <div>
            <label>HR Officer</label>
            <select name="hr_officer_id">
                <option value="">-- Select HR Officer --</option>
                @foreach($hrOfficers as $hr)
                    <option value="{{ $hr->id }}" {{ old('hr_officer_id', $leaveRequest->hr_officer_id) == $hr->id ? 'selected' : '' }}>
                        {{ $hr->first_name }} {{ $hr->last_name }} ({{ $hr->department->name }})
                    </option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit">Save Decision</button>
        <a href="{{ route('leave-requests.index') }}">Cancel</a>
    </form>
</body>
</html>
