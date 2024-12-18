@extends('layouts.app')

@section('content')
    <div class="container px-4 py-6 mx-auto">
        <h1 class="mb-6 text-3xl font-bold text-gray-800">Create Order</h1>

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="products" class="block text-lg font-semibold text-gray-700">Select Products</label>
                <select id="products" name="products[]" class="w-full p-3 border-gray-300 rounded-lg" multiple>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }} - ${{ $product->price }}</option>
                    @endforeach
                </select>
                @error('products')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-6">
                <label for="total" class="block text-lg font-semibold text-gray-700">Total Amount</label>
                <input type="number" id="total" name="total" value="{{ old('total') }}" class="w-full p-3 border-gray-300 rounded-lg" required>
                @error('total')
                    <div class="text-sm text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="hover:bg-blue-700 w-full py-2 text-white transition bg-blue-600 rounded-lg">Create Order</button>
        </form>
    </div>
@endsection
