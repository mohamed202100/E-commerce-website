@extends('layouts.gift')
@section('title', 'Product - Cart')
@section('content')
    @if (session('delete'))
        <div
            style="border: 1px solid rgb(43, 43, 162); color: white; border-radius: 4px rounded; padding: 10px;
        background-color: rgb(38, 199, 49); margin-bottom: 10px;">
            {{ session('delete') }}
        </div>
    @endif
    <table style="width: 100%; border-collapse: collapse; font-family: arial, sans-serif;">
        <thead>
            <tr style="background-color: #f2f2f2">
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Product Title</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Product Price</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Product Image</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd" colspan="2">Action</th>
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
                    <td>
                        <form action="{{ route('productscart.delete', $cart->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <input type="submit" value="Delete" name="delete" class="btn btn-danger"
                                onclick="return confirm('Are You Sure?')">
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $cart->id) }}" style="color: green">Edit</a>
                    </td>
                </tr>
            @endforeach
    </table>


@endsection
