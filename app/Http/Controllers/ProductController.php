<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        return view('products.create');
    }

    // Menyimpan produk baru ke database
    public function store(Request $request)
    {
        $data = $this->validasi($request);
        Product::create($data);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    // Menampilkan form edit produk
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Menyimpan perubahan data produk
    public function update(Request $request, Product $product)
    {
        $data = $this->validasi($request, $product->id);
        $product->update($data);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    // Menghapus produk
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }

    // Aturan validasi, dipakai bersama oleh store() dan update()
    private function validasi(Request $request, $id = null)
    {
        return $request->validate([
            'kode_produk' => [
                'required',
                'max:20',
                Rule::unique('products', 'kode_produk')->ignore($id),
            ],
            'nama_produk' => 'required|max:255',
            'harga'       => 'required|integer|min:0',
            'stok'        => 'required|integer|min:0',
            'deskripsi'   => 'nullable',
        ], [
            'required' => ':attribute wajib diisi.',
            'unique'   => ':attribute sudah digunakan.',
            'integer'  => ':attribute harus berupa angka bulat.',
            'min'      => ':attribute tidak boleh kurang dari :min.',
            'max'      => ':attribute maksimal :max karakter.',
        ], [
            'kode_produk' => 'Kode produk',
            'nama_produk' => 'Nama produk',
            'harga'       => 'Harga',
            'stok'        => 'Stok',
        ]);
    }
}
