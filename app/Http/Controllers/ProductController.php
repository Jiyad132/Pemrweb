<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(100);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nama' => 'required',
        'harga' => 'required|numeric',
        'foto' => 'required|image|mimes:jpeg,png,jpg'
    ]);

    $foto = $request->file('foto');
    $foto->storeAs('images', $foto->hashName(), 'public');

    Product::create([
        'nama' => $request->nama,
        'harga' => str_replace(".", "", $request->harga),
        'deskripsi' => $request->deskripsi,
        'foto' => 'images/' . $foto->hashName(),
    ]);

    return redirect()->route('products.index')->with('success', 'Produk Berhasil Ditambahkan');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
        'nama' => 'required',
        'harga' => 'required|numeric'
    ]);

    $product-> nama= $request-> nama;
    $product-> harga= str_replace(".", "", $request->harga);
    $product-> deskripsi= $request-> deskripsi;

    if($request->file('foto')) {
        Storage::disk('local')->delete('public/', $product->foto);
        $foto = $request->file('foto');
        $foto->storeAs('images', $foto->hashName(), 'public');
        $product->foto = $foto->hashName();
    }

    $product->update();
    return redirect()->route('products.index')->with('success', 'Produk Berhasil Diupdate');
    }

    public function destroy(Product $product)
    {
        // Hapus gambar jika ada
        if ($product->foto && Storage::disk('public')->exists($product->foto)) {
        Storage::disk('public')->delete($product->foto);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function show($id)
    {
    $product = Product::findOrFail($id);
    return view('products.show', compact('product'));
    }


}