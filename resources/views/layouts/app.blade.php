<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Toko Sederhana')</title>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body { background: #f3f4f6; color: #202b3b; }
        .topbar { min-height: 66px; }
        .sidebar { min-height: calc(100vh - 66px); background: #202b3b; }
        .sidebar a { color: #d7dce5; text-decoration: none; }
        .sidebar a:hover, .sidebar a.active { background: #374355; color: #fff; }
        .page-content { min-height: calc(100vh - 66px); }
        @media (max-width: 767.98px) {
            .sidebar { min-height: auto; }
            .page-content { min-height: calc(100vh - 210px); }
        }
    </style>
</head>
<body>
    <header class="topbar bg-white border-bottom d-flex align-items-center justify-content-between px-4">
        <a class="text-decoration-none text-dark fw-semibold" href="{{ route('products.index') }}">
            <span class="me-2" aria-hidden="true">☰</span> Dashboard
        </a>
        <div class="d-flex align-items-center gap-3">
            @auth
                <span class="text-secondary">{{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-secondary btn-sm" type="submit">Keluar</button>
                </form>
            @else
                <a class="text-secondary text-decoration-none" href="{{ route('login') }}">Masuk</a>
                <a class="btn btn-primary btn-sm" href="{{ route('register') }}">Daftar</a>
            @endauth
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <aside class="col-md-3 col-lg-2 sidebar p-3">
                <div class="text-white fw-semibold fs-5 mb-4">Toko Sederhana</div>
                <nav class="d-grid gap-2">
                    <a class="rounded px-3 py-2" href="{{ route('products.index') }}">Dashboard</a>
                    <a class="active rounded px-3 py-2" href="{{ route('products.index') }}">Data Produk</a>
                </nav>
            </aside>

            <main class="col-md-9 col-lg-10 page-content p-4">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
