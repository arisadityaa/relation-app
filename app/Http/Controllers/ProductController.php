<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::with('category')->get();

        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'name' =>   'required',
            'harga' => 'required|numeric',
            'stock' => 'required|numeric',

        ]);

        $product = Product::create($validate);
        $product->category()->sync($request->category);
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        $categories = Category::all();
        return view('product.update', compact('categories', 'product', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' =>   'required',
            'harga' => 'required|numeric',
            'stock' => 'required|numeric',

        ]);
        $product = Product::find($id);
        $product->update($validate);
        $product->category()->sync($request->category);
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        $product->loadMissing('category');
        $product->category()->detach();
        $product->delete();

        return redirect()->back();
    }
}
