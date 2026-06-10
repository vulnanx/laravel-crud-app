<!DOCTYPE html>
<html>

<head>
    <title>Add Department</title>
</head>

<body>
    <h1>Add Department</h1>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('departments.store') }}">
        @csrf
        <div>
            <label>Department Name</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>
        <br>
        <button type="submit">Save</button>
        <a href="{{ route('departments.index') }}">Cancel</a>
    </form>
</body>

</html>