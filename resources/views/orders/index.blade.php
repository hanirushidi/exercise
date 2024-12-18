@extends('layouts.app')

@section('content')
    <h1>Orders</h1>
    <ul>
        @foreach($orders as $order)
            <li>Order ID: {{ $order->id }} - Total: ${{ $order->total }}</li>
        @endforeach
    </ul>
@endsection
