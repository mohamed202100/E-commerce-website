@extends('layouts.gift')

@section('title', 'Product - Details')

@section('content')
    <br>
    <a href="{{ route('index') }}" class="btn btn-secondary">Back to Shop</a>
    <br>
    @if (session('success'))
        <div
            style="border: 1px solid rgb(43, 43, 162); color: white; border-radius: 4px rounded; padding: 10px;
        background-color: rgb(38, 199, 49); margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif

    <section class="shop_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="{{ asset('products/' . $product->product_image) }}" alt="{{ $product->product_title }}"
                            style="max-width:100%; max-height:400px; object-fit:cover;">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail-box">
                        <h2>{{ $product->product_title }}</h2>
                        <h4 class="text-success">Price: ${{ $product->product_price }}</h4>
                        <p>{{ $product->product_description }}</p>
                        <p><strong>Category:</strong> {{ $product->product_category }}</p>
                        <p><strong>Available Quantity:</strong> {{ $product->product_quantity }}</p>

                        <a href="{{ route('addtocart', $product->id) }}" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
