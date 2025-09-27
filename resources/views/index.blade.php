@extends('layouts.gift')

@section('title', 'Home - Giftos')

@section('content')
    <section class="slider_section">
        <div class="slider_container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="detail-box">
                                        <h1>
                                            Welcome To Our <br>
                                            Gift Shop
                                        </h1>
                                        <p>
                                            Sequi perspiciatis nulla reiciendis, rem, tenetur impedit, eveniet non
                                            necessitatibus error distinctio mollitia suscipit. Nostrum fugit doloribus
                                            consequatur distinctio esse, possimus maiores aliquid repellat beatae cum,
                                            perspiciatis enim, accusantium perferendis.
                                        </p>
                                        <a href="">
                                            Contact Us
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-5 ">
                                    <div class="img-box">
                                        <img style="width:600px" src="{{ asset('front/images/image3.jpeg') }}"
                                            alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- shop section -->
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Latest Products</h2>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="box">
                            <a href="{{ route('product_Details', $product->id) }}">
                                <div class="img-box">
                                    <img src="{{ asset('products/' . $product->product_image) }}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h6>{{ $product->product_title }}</h6>
                                    <h6>Price <span>${{ $product->product_price }}</span></h6>
                                </div>
                                <div class="new"><span>New</span></div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="btn-box">
                <a href="{{ route('viewallproducts') }}">
                    View All Products
                </a>
            </div>
        </div>
    </section>
@endsection
