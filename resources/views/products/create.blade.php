@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="card shadow-sm">
    <div class="card-header"><h5 class="mb-0">Tambah Produk</h5></div>
    <div class="card-body">
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            @include('products._form')
        </form>
    </div>
</div>
@endsection
