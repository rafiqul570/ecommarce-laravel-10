@extends('front.layouts.template')
@include('front.inc.header')
@section('content')

<div class="container mt-5">
    <h2 class="mb-4">Shopping Cart</h2>
   
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart_items as $item)
                    <tr>
                        <td>{{$item -> product_name}}</td>
                        <td>{{$item -> product_price}}</td>
                        <td>{{$item -> quantity}}</td>
                        <td>${{ number_format($item['product_price'] * $item['quantity'], 2) }}</td>
                        <td>
                            <form method="POST" action="{{ route('remove.from.cart') }}">
                                @csrf
                                
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection