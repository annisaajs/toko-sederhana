<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Akun') - Toko Sederhana</title>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <header class="bg-white border-bottom py-3 px-4">
        <a href="{{ route('products.index') }}" class="text-dark text-decoration-none fw-semibold">
            Toko Sederhana
        </a>
    </header>
    <main class="container py-5">
        <div class="card border-0 shadow-sm mx-auto" style="max-width: 500px;">
            <div class="card-body p-4 p-md-5">
                @yield('content')
            </div>
        </div>
    </main>
</body>
</html>
