@extends('admin.mainDesign')

@section('view-category')
    @if (session('delete'))
        <div
            style="border: 1px solid rgb(30, 30, 82); color: white; border-radius: 4px rounded; padding: 10px;
        background-color: rgb(221, 56, 44); margin-bottom: 10px;">
            {{ session('delete') }}
        </div>
    @endif
    @if (session('update'))
        <div
            style="border: 1px solid rgb(43, 43, 162); color: white; border-radius: 4px rounded; padding: 10px;
        background-color: rgb(38, 199, 49); margin-bottom: 10px;">
            {{ session('update') }}
        </div>
    @endif
    <div class="list-inline-item">
        <form action="{{ route('admin.searchproduct') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="search" name="search" placeholder="What are you searching for...">
                <button type="submit" class="submit">Search</button>
            </div>
        </form>
    </div>
    <table style="width: 100%; border-collapse: collapse; font-family: arial, sans-serif;">
        <thead>
            <tr style="background-color: #f2f2f2">
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Category ID</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Title</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Description</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Category</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Price</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Quantity</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Image</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd" colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr style="border-bottom: 1px solid #ddd">
                    <td style="padding: 12px;">{{ $product->id }}</td>
                    <td style="padding: 12px;">{{ $product->product_title }}</td>
                    <td style="padding: 12px;">{{ Str::limit($product->product_description, 50) }}</td>
                    <td style="padding: 12px;">{{ $product->product_category }}</td>
                    <td style="padding: 12px;">{{ $product->product_price }}</td>
                    <td style="padding: 12px;">{{ $product->product_quantity }}</td>
                    <td>
                        @if ($product->product_image)
                            <img src="{{ asset('products/' . $product->product_image) }}" width="80">
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('products.delete', $product->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <input type="submit" value="Delete" name="delete" class="btn btn-danger"
                                onclick="return confirm('Are You Sure?')">
                        </form>
                        <a href="{{ route('products.edit', $product->id) }}" style="color: green">Edit</a>
                    </td>
                </tr>
            @endforeach
            {{ $products->links() }}
    </table>
@endsection
