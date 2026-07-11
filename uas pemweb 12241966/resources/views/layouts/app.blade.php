<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Perpustakaan Digital</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"rel="stylesheet" />
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color:#343a40;">
    <div class="container">

        <a class="navbar-brand" href="{{ route('dashboard') }}">
            Perpustakaan Digital
        </a>

        <div class="navbar-nav ms-auto">

            <a class="nav-link" href="{{ route('dashboard') }}">
                Dashboard
            </a>

            <a class="nav-link" href="{{ route('buku.index') }}">
                Buku
            </a>

            <a class="nav-link" href="{{ route('anggota.index') }}">
                Anggota
            </a>

            <a class="nav-link" href="{{ route('peminjaman.index') }}">
                Peminjaman
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button class="btn btn-outline-light btn-sm ms-3">
                    Logout
                </button>

            </form>

        </div>

    </div>
</nav>

<div class="container mt-4">

    @yield('content')

</div>
<footer class="text-center py-3 mt-5 bg-light">

    <small>

        © {{ date('Y') }} Perpustakaan Digital | Dibuat oleh Jibran Rizki

    </small>

</footer>

<script src="https://code.jquery.com/jquery-3.7.1.min.js">
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js">
</script>

</body>
</html>