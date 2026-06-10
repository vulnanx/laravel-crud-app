<!DOCTYPE html>
<html>

<head>
    <title>Students</title>
</head>

<body>
    <h1>Students</h1>
    <a href="{{ route('students.create') }}">Add Student</a>
    <table border="1">
        <tr>
            <th>ID Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
        </tr>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->id_number }}</td>
                <td>{{ $student->first_name }}</td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->email }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>