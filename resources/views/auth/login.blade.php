@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
<h1 class="h4 mb-4">Masuk</h1>
<form action="{{ route('login.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" name="email" type="email"
               class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email') }}" required autofocus autocomplete="username">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input id="password" name="password" type="password"
               class="form-control @error('password') is-invalid @enderror"
               required autocomplete="current-password">
        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="form-check mb-4">
        <input id="remember" name="remember" type="checkbox" class="form-check-input">
        <label for="remember" class="form-check-label">Ingat saya</label>
    </div>
    <button class="btn btn-primary w-100" type="submit">Masuk</button>
</form>
<p class="text-center text-secondary mt-3 mb-0">
    Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
</p>
@endsection
