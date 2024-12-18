<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Display a list of all products
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // Show a single product's details
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Show the form for creating a new product
    public function create()
    {
        return view('products.create');
    }

    // Store a new product in the database
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|nullable',
        ]);

        // Create a new product instance with mass assignment
        $product = new Product($request->all());

        // Handle the image upload if there is a file
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images', 'public');
        }

        // Save the product to the database
        $product->save();

        // Redirect back to the product list with a success message
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    // Show the form for editing an existing product
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update the specified product in the database
    public function update(Request $request, Product $product)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'image|nullable',
        ]);

        // Update product with new data
        $product->update($request->all());

        // Handle the image upload if there is a file
        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('images', 'public');
        }

        // Redirect back to the product list with a success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    // Delete the specified product
    public function destroy(Product $product)
    {
        // Delete the product from the database
        $product->delete();

        // Redirect back to the product list with a success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
