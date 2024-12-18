@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
    <div class="bg-gray-50 flex items-center justify-center min-h-screen p-6">
        <div class="w-full max-w-2xl p-8 bg-white rounded-lg shadow-lg">
            <h1 class="mb-6 text-3xl font-semibold text-gray-800">Create New Product</h1>

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Product Name -->
                <div class="mb-4">
                    <label for="name" class="block font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required
                        class="focus:outline-none focus:ring-2 focus:ring-blue-500 w-full p-3 mt-2 border border-gray-300 rounded-lg">
                    @error('name')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Product Description -->
                <div class="mb-4">
                    <label for="description" class="block font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" required
                        class="focus:outline-none focus:ring-2 focus:ring-blue-500 w-full p-3 mt-2 border border-gray-300 rounded-lg">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Product Price -->
                <div class="mb-4">
                    <label for="price" class="block font-medium text-gray-700">Price</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" required
                        class="focus:outline-none focus:ring-2 focus:ring-blue-500 w-full p-3 mt-2 border border-gray-300 rounded-lg">
                    @error('price')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Product Image -->
                <div class="mb-6">
                    <label for="image" class="block font-medium text-gray-700">Image</label>
                    <input type="file" id="image" name="image"
                        class="focus:outline-none focus:ring-2 focus:ring-blue-500 w-full p-3 mt-2 border border-gray-300 rounded-lg">
                    @error('image')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full p-3 mt-4 text-white transition bg-blue-600 rounded-lg">
                    Create Product
                </button>
            </form>
        </div>
    </div>
@endsection
