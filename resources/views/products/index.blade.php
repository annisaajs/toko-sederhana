@extends('layouts.app')

@section('title', 'Data Produk')

@section('content')
<div class="d-flex align-items-center justify-content-between mb-3">
    <h5 class="mb-0">Data Produk</h5>
    <a href="{{ route('products.create') }}" class="text-primary text-decoration-none">
        + Tambah Produk
    </a>
</div>

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($products as $product)
            <tr>
                <td>{{ $products->firstItem() + $loop->index }}</td>
                <td>{{ $product->kode_produk }}</td>
                <td>{{ $product->nama_produk }}</td>
                <td>Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                <td>{{ $product->stok }}</td>
                <td>
                    <a href="{{ route('products.edit', $product) }}"
                       class="btn btn-outline-primary btn-sm">Edit</a>
                    <form action="{{ route('products.destroy', $product) }}"
                          method="POST" class="d-inline"
                          onsubmit="return confirm('Yakin hapus produk ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-secondary">Belum ada data produk.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

{{ $products->links() }}
@endsection
