@extends('layouts.gift')

@section('title', 'Product - Details')

@section('content')
    <a href="{{ route('index') }}" class="btn btn-secondary">Back to Shop</a>

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

                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
