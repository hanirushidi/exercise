<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Fetch all orders
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    // Other CRUD methods for orders can be added here
}
