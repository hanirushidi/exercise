@extends('layouts.app')

@section('content')
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 p-6 text-white bg-blue-600">
            <h2 class="mb-6 text-2xl font-semibold">Admin Dashboard</h2>
            <ul>
                <li><a href="{{ route('products.index') }}" class="hover:bg-blue-500 block px-4 py-2">Products</a></li>
                <li><a href="{{ route('users.index') }}" class="hover:bg-blue-500 block px-4 py-2">Users</a></li>
                <li><a href="{{ route('orders.index') }}" class="hover:bg-blue-500 block px-4 py-2">Orders</a></li>
                <li><a href="{{ route('dashboard') }}" class="hover:bg-blue-500 block px-4 py-2">Dashboard</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="md:grid-cols-3 grid grid-cols-1 gap-6">
                <!-- Total Products Card -->
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold">Total Products</h3>
                    <p class="text-2xl">{{ $totalProducts }}</p>
                </div>

                <!-- Total Users Card -->
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold">Total Users</h3>
                    <p class="text-2xl">{{ $totalUsers }}</p>
                </div>

                <!-- Total Orders Card -->
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <h3 class="text-xl font-semibold">Total Orders</h3>
                    <p class="text-2xl">{{ $totalOrders }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
