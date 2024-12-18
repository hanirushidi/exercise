@extends('layouts.app')

@section('content')
    <div class="container px-4 py-6 mx-auto">
        <h1 class="mb-6 text-3xl font-bold text-gray-800">Orders</h1>

        @if($orders->isEmpty())
            <div class="p-4 text-yellow-800 bg-blue-100 rounded-lg">
                <p class="font-semibold text-center">No orders yet...</p>
            </div>
        @else
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <ul class="space-y-4">
                    @foreach($orders as $order)
                        <li class="bg-gray-50 hover:bg-gray-100 flex items-center justify-between p-4 transition rounded-lg">
                            <span class="text-lg font-semibold text-gray-700">Order ID: {{ $order->id }}</span>
                            <span class="text-xl font-bold text-green-600">${{ $order->total }}</span>
                            <div class="text-sm text-gray-600">
                                Products:
                                @foreach($order->products as $product)
                                    {{ $product->name }} ({{ $product->price }}),
                                @endforeach
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
