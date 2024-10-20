<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conference registration</title>
</head>
<body>
<h1>Conference Registration</h1>
<p>Name: Arminas Rupšys</p>
<p>Group: PIT-22</p>

<div class="container mt-5">
        <h1>Welcome to the Conference Management System</h1>
        <ul class="list-group">
            <li class="list-group-item"><a href="{{ url('/admin/conferences') }}">Manage Conferences</a></li>
            <li class="list-group-item"><a href="{{ url('/admin/users') }}">Manage Users</a></li>
            <li class="list-group-item"><a href="{{ url('/user') }}">User Page</a></li>
            <li class="list-group-item"><a href="{{ url('/employee') }}">Employee Page</a></li>
        </ul>
    </div>
</body>
</html>