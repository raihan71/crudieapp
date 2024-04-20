<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index() {
        $product = Product::orderBy('updated_at', 'desc')->get();

        return view('products.index', [
            'product' => $product
        ]);
    }

    function add() {
        return view('products.add');
    }

    function save(Request $request) {
        $request->validate([
            'title' => 'required|string',
            'desc'  => 'required|string'
        ]);

        $product = new Product();
        $product->title = $request->input('title');
        $product->desc = $request->input('desc');
        $product->save();

        return redirect('/')->with('success', 'Produk berhasil disimpan.');
    }

    function edit($id) {

    }

    function update() {
    }
}
