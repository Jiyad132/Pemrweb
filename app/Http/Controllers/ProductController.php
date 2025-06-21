<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
       $products = Product::paginate(1);

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
            'harga' => 'required|numeric'
        ]);

            Product::create([
                'nama'=>$request->nama,
                'harga'=>$request->harga,
                'deskripsi'=>$request->deskripsi
             ]);

             return redirect()->route('products.index')->with('succes','produk berhasil ditambahkan');

    }



}
