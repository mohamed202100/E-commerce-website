@extends('layouts.gift')
@section('title', 'Product - Cart')
@section('content')
    <table style="width: 100%; border-collapse: collapse; font-family: arial, sans-serif;">
        <thead>
            <tr style="background-color: #f2f2f2">
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Title</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Price</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $cart)
                <tr style="border-bottom: 1px solid #ddd">
                    <td style="padding: 12px;">{{ $cart->product->product_title }}</td>
                    <td style="padding: 12px;">{{ $cart->product->product_price }}</td>
                    <td>
                        <img src="{{ asset('products/' . $cart->product->product_image) }}" width="80">
                    </td>
                </tr>
            @endforeach
    </table>


@endsection
