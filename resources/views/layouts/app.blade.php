<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>UAS WEB Stevano Marawo</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f6f9;
        }

        .navbar {
            box-shadow: 0 4px 10px rgba(0,0,0,.1);
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,.08);
        }

        .btn {
            border-radius: 8px;
        }

        .table thead {
            background: #212529;
            color: white;
        }

        .pagination {
            font-size: 14px;
        }

        .pagination .page-link {
            padding: 4px 10px;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            Album Lagu 🎵 
        </a>

        <div class="ms-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-light btn-sm">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- CONTENT -->
<main class="container my-5">
    @yield('content')
</main>

</body>
</html>
