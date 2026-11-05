@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
<h1 class="h4 mb-4">Buat Akun</h1>
<form action="{{ route('register.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" name="name" type="text"
               class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name') }}" required autofocus autocomplete="name">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" name="email" type="email"
               class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email') }}" required autocomplete="username">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input id="password" name="password" type="password"
               class="form-control @error('password') is-invalid @enderror"
               required autocomplete="new-password">
        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="mb-4">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input id="password_confirmation" name="password_confirmation" type="password"
               class="form-control" required autocomplete="new-password">
    </div>
    <button class="btn btn-primary w-100" type="submit">Daftar</button>
</form>
<p class="text-center text-secondary mt-3 mb-0">
    Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
</p>
@endsection
