@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
    <div class="bg-gray-50  flex items-center justify-center">
        <div class="w-full max-w-lg p-6 bg-white rounded-md shadow-lg">
            <h1 class="mb-6 text-3xl font-semibold text-center">Edit Product</h1>

            <!-- Error Handling -->
            @if ($errors->any())
                <div class="p-4 mb-4 text-red-700 bg-red-100 border border-red-400">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Product Name -->
                <div class="flex flex-col">
                    <label for="name" class="text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" class="w-full p-3 mt-1 border rounded-md" required>
                </div>

                <!-- Description -->
                <div class="flex flex-col">
                    <label for="description" class="text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" class="w-full p-3 mt-1 border rounded-md" required>{{ old('description', $product->description) }}</textarea>
                </div>

                <!-- Price -->
                <div class="flex flex-col">
                    <label for="price" class="text-sm font-medium text-gray-700">Price</label>
                    <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" class="w-full p-3 mt-1 border rounded-md" required>
                </div>

                <!-- Product Image -->
                <div class="flex flex-col">
                    <label for="image" class="text-sm font-medium text-gray-700">Product Image (optional)</label>
                    <input type="file" id="image" name="image" class="w-full p-3 mt-1 border rounded-md">
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit" class="hover:bg-blue-600 w-full p-3 mt-4 text-white bg-blue-500 rounded-md">
                        Update Product
                    </button>
                </div>
            </form>

            <!-- Back Link -->
            <div class="flex justify-center mt-4">
                <a href="{{ route('products.index') }}" class="hover:text-blue-700 text-blue-500">Back to Product List</a>
            </div>
        </div>
    </div>
@endsection
