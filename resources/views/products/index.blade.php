@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="bg-gray-50 flex items-center justify-center min-h-screen p-6">
        <div class="w-full max-w-4xl p-8 bg-white rounded-lg shadow-lg">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-3xl font-semibold text-gray-800">Product List</h1>
                <a href="{{ route('products.create') }}" class="hover:bg-blue-700 px-4 py-2 text-white transition bg-blue-600 rounded-lg">
                    Create New Product
                </a>
            </div>

            @if($products->isEmpty())
                <p class="text-center text-gray-600">No products found. Please create a new product.</p>
            @else
                <ul class="space-y-4">
                    @foreach ($products as $product)
                        <li class="bg-gray-50 hover:bg-gray-100 flex items-center justify-between p-4 transition rounded-lg shadow-sm">
                            <div>
                                <strong class="text-lg text-gray-800">{{ $product->name }}</strong>
                                <p class="text-gray-600">${{ number_format($product->price, 2) }}</p>
                            </div>

                            <div class="flex space-x-4">
                                <a href="{{ route('products.show', $product) }}" class="hover:underline text-blue-500">View</a>
                                <a href="{{ route('products.edit', $product) }}" class="hover:underline text-yellow-500">Edit</a>

                                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="hover:text-red-800 text-red-600">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
