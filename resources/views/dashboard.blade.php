<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - IPK App</title>
</head>
<body>

    <h1>Dashboard IPK</h1>

    <h2>Selamat datang, {{ $user->name }}!</h2>

    <p>Email: {{ $user->email }}</p>

    <hr>

    <p>Dashboard berhasil dibuat.</p>

    <hr>

<form action="/logout" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>

</body>
</html>