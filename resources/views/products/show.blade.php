@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
    <div class="bg-gray-50 flex justify-center p-6">
        <div class="w-full max-w-4xl p-8 bg-white rounded-lg shadow-lg">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-3xl font-semibold text-gray-800">{{ $product->name }}</h1>
                <p class="text-xl text-gray-600">${{ number_format($product->price, 2) }}</p>
            </div>

            <div class="md:flex-row flex flex-col gap-6">
                <!-- Product Image -->
                <div class="md:w-1/3 w-full">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="w-full h-auto rounded-lg shadow-lg">
                    @else
                        <div class="flex items-center justify-center w-full h-64 text-gray-500 bg-gray-200 rounded-lg">
                            No Image Available
                        </div>
                    @endif
                </div>

                <!-- Product Details -->
                <div class="md:w-2/3 w-full">
                    <p class="mb-4 text-lg text-gray-700">{{ $product->description }}</p>

                    <div class="flex justify-between mt-4">
                        <a href="{{ route('products.index') }}" class="hover:underline text-blue-500">Back to Product List</a>
                        <a href="{{ route('products.edit', $product) }}" class="hover:bg-blue-700 px-4 py-2 text-white transition bg-blue-600 rounded-lg">Edit Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
