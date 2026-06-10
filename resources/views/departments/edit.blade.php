<!DOCTYPE html>
<html>

<head>
    <title>Edit Department</title>
</head>

<body>
    <h1>Edit Department</h1>

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('departments.update', $department) }}">
        @csrf
        @method('PUT')
        <div>
            <label>Department Name</label>
            <input type="text" name="name" value="{{ old('name', $department->name) }}">
        </div>
        <br>
        <button type="submit">Update</button>
        <a href="{{ route('departments.index') }}">Cancel</a>
    </form>
</body>

</html>