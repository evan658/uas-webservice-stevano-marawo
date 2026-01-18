<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>

    <h1>Dashboard</h1>
    <p>Anda berhasil login.</p>

    <form method="POST" action="/logout">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>
