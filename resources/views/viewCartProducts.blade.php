@extends('layouts.gift')

@section('title', 'Product - Cart')

@section('content')

    @if (session('delete'))
        <div
            style="border: 1px solid rgb(8, 8, 21); color: white; border-radius: 4px rounded; padding: 10px;
        background-color: rgb(209, 56, 33); margin-bottom: 10px;">
            {{ session('delete') }}
        </div>
    @endif
    @if (session('confirm'))
        <div
            style="border: 1px solid rgb(8, 8, 21); color: white; border-radius: 4px rounded; padding: 10px;
        background-color: rgb(40, 177, 25); margin-bottom: 10px;">
            {{ session('confirm') }}
        </div>
    @endif

    <div style="width: 1600px; margin:0 auto; padding:20px">
        <table style="width: 100%; border-collapse: collapse; font-family: arial, sans-serif;">
            <thead>
                <tr style="background-color: #f2f2f2">
                    <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Product Title</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Product Price</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Product Image</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total_price = 0;
                @endphp
                @foreach ($cart as $cart)
                    <tr style="border-bottom: 1px solid #ddd">
                        <td style="padding: 12px;">{{ $cart->product->product_title }}</td>
                        <td style="padding: 12px;">${{ $cart->product->product_price }}</td>
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
                    </tr>

                    @php
                        $total_price += $cart->product->product_price;
                    @endphp
                @endforeach
            <tfoot>
                <tr style="background-color: #f2f2f2">
                    <td style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd ;display: flex; justify-content:space-between;"
                        colspan="5">
                        <h4>Total Price: </h4>
                        <h4>${{ $total_price }}</h4>
                    </td>
                </tr>
            </tfoot>
        </table>

        <form action="{{ route('confirmorder') }}" method="post" style="margin-top: 20px">
            @csrf
            <input type="text" name="address" id="address" placeholder="enter your address" required><br><br>
            <input type="text" name="phone" id="phone" placeholder="enter your phone" required><br><br>
            <input type="submit" value="Confirm Order" name="submit" class="btn btn-primary"><br><br>
            <a href="{{ route('stripe', $total_price) }}"
                style="background-color: #a1cde3; padding: 12px; border-radius: 12px;">
                Pay Now</a>
        </form>
    </div>


@endsection
