<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Display all orders
    public function index()
    {
        // Fetch all orders
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    // Show the form to create a new order
    public function create()
    {
        // Fetch all products to create an order
        $products = Product::all();
        return view('orders.create', compact('products'));
    }

    // Store a newly created order in the database
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'products' => 'required|array', // Expecting an array of product IDs
            'quantities' => 'required|array', // Expecting an array of quantities
            'total' => 'required|numeric',    // Expecting the total price
        ]);

        // Create the order
        $order = new Order();
        $order->user_id = auth()->id();  // Set the user_id to the currently authenticated user's ID
        $order->total = $request->total;  // Assign total value from the form
        $order->save();  // Save the order to the database

        // Attach products to the order (many-to-many relationship with quantity and price)
        foreach ($request->products as $index => $productId) {
            // Get the product to fetch its price
            $product = Product::find($productId);
            
            // Attach the product with quantity and price to the pivot table
            $order->products()->attach($productId, [
                'quantity' => $request->quantities[$index], // Quantity selected by the user
                'price' => $product->price, // Price at the time of order
            ]);
        }

        // Redirect to the orders index page with a success message
        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }
}
