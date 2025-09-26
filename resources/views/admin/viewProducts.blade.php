@extends('admin.mainDesign')

@section('view-product')
    @if (session('success'))
        <div
            style="border: 1px solid blue; color: white; border-radius: 4px rounded; padding: 10px;
        background-color: green; margin-bottom: 10px;">
            {{ session('success') }}
        </div>
    @endif
    <h2>All Products</h2>
    <table style="width:100%; border-collapse: collapse;">
        <thead>
            <tr style="background:#eee;">
                <th>ID</th>
                <th>Title</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->product_title }}</td>
                    <td>{{ $product->product_category }}</td>
                    <td>{{ $product->product_price }}</td>
                    <td>{{ $product->product_quantity }}</td>
                    <td>
                        @if ($product->product_image)
                            <img src="{{ asset('products/' . $product->product_image) }}" width="80">
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
