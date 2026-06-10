<!DOCTYPE html>
<html>
<head>
    <title>Add Leave Type</title>
</head>
<body>
    <h1>Add Leave Type</h1>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('leave-types.store') }}">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Sick Leave">
        </div>
        <div>
            <label>Max Days</label>
            <input type="number" name="max_days" value="{{ old('max_days') }}" min="1">
        </div>
        <br>
        <button type="submit">Save</button>
        <a href="{{ route('leave-types.index') }}">Cancel</a>
    </form>
</body>
</html>
