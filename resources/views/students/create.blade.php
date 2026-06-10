<!DOCTYPE html>
<html>

<head>
    <title>Add Student</title>
</head>

<body>
    <h1>Add Student</h1>
    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        <div>
            <label>ID Number</label>
            <input type="text" name="id_number">
        </div>
        <div>
            <label>First Name</label>
            <input type="text" name="first_name">
        </div>
        <div>
            <label>Last Name</label>
            <input type="text" name="last_name">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email">
        </div>
        <button type="submit">Save</button>
    </form>
</body>

</html>