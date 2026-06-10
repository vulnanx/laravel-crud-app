<!DOCTYPE html>
<html>
<head>
    <title>File Leave Request</title>
</head>
<body>
    <h1>File Leave Request</h1>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('leave-requests.store') }}">
        @csrf
        <div>
            <label>Employee</label>
            <select name="employee_id">
                <option value="">-- Select Employee --</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ old('employee_id') == $employee->id ? 'selected' : '' }}>
                        {{ $employee->first_name }} {{ $employee->last_name }} ({{ $employee->employee_number }})
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Leave Type</label>
            <select name="leave_type_id">
                <option value="">-- Select Leave Type --</option>
                @foreach($leaveTypes as $leaveType)
                    <option value="{{ $leaveType->id }}" {{ old('leave_type_id') == $leaveType->id ? 'selected' : '' }}>
                        {{ $leaveType->name }} (max {{ $leaveType->max_days }} days)
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Start Date</label>
            <input type="date" name="start_date" value="{{ old('start_date') }}">
        </div>
        <div>
            <label>End Date</label>
            <input type="date" name="end_date" value="{{ old('end_date') }}">
        </div>
        <div>
            <label>Reason</label>
            <textarea name="reason" rows="4" cols="50">{{ old('reason') }}</textarea>
        </div>
        <br>
        <button type="submit">Submit Request</button>
        <a href="{{ route('leave-requests.index') }}">Cancel</a>
    </form>
</body>
</html>
