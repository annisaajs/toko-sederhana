<div class="mb-3">
    <label class="form-label">Kode Produk</label>
    <input type="text" name="kode_produk"
           class="form-control @error('kode_produk') is-invalid @enderror"
           value="{{ old('kode_produk', $product->kode_produk ?? '') }}">
    @error('kode_produk')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Nama Produk</label>
    <input type="text" name="nama_produk"
           class="form-control @error('nama_produk') is-invalid @enderror"
           value="{{ old('nama_produk', $product->nama_produk ?? '') }}">
    @error('nama_produk')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Harga (Rp)</label>
        <input type="number" name="harga"
               class="form-control @error('harga') is-invalid @enderror"
               value="{{ old('harga', $product->harga ?? '') }}">
        @error('harga')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stok"
               class="form-control @error('stok') is-invalid @enderror"
               value="{{ old('stok', $product->stok ?? 0) }}">
        @error('stok')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Deskripsi</label>
    <textarea name="deskripsi" rows="3"
              class="form-control">{{ old('deskripsi', $product->deskripsi ?? '') }}</textarea>
</div>

<button type="submit" class="btn btn-success">Simpan</button>
<a href="{{ route('products.index') }}" class="btn btn-secondary">Batal</a>
