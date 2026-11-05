@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="card shadow-sm">
    <div class="card-header"><h5 class="mb-0">Edit Produk</h5></div>
    <div class="card-body">
        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            @include('products._form')
        </form>
    </div>
</div>
@endsection
