<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'in_stock' => 'boolean'
    ]);

    // Use only() to get specific fields, excluding _token
    $data = $request->only(['name', 'category', 'price', 'in_stock']);

    // Handle checkbox properly
    $data['in_stock'] = $request->has('in_stock');

    Product::create($data);

    return redirect()->route('products.index')
        ->with('success', 'Product created successfully.');
}
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

   public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'sometimes|required|string|max:255',
        'category' => 'sometimes|required|string|max:255',
        'price' => 'sometimes|required|numeric|min:0',
        'in_stock' => 'sometimes|boolean'
    ]);

    // Update only the fields that are present in request
    if ($request->has('name')) {
        $product->name = $request->name;
    }
    if ($request->has('category')) {
        $product->category = $request->category;
    }
    if ($request->has('price')) {
        $product->price = $request->price;
    }
    if ($request->has('in_stock')) {
        $product->in_stock = $request->boolean('in_stock');
    }

    $product->save();

    return redirect()->route('products.index')
        ->with('success', 'Product updated successfully.');
}
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
