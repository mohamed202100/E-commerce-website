@extends('admin.mainDesign')

@section('edit-category')
    <div class="container-fluid">
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @method('put')
            @csrf
            <input type="text" name="product_title" value="{{ $product->product_title }}">
            <br><br>
            <textarea name="product_description">
               {{ $product->product_description }}
            </textarea><br><br>
            <input type="number" name="product_quantity" value="{{ $product->product_quantity }}">
            <br><br>
            <input type="number" name="product_price" value="{{ $product->product_price }}">
            <br><br>
            <img src="{{ asset('products/' . $product->product_image) }}" style="width: 100px">
            <br><br>
            <input type="file" name="product_image" value="Upload Image">
            <br><br>
            <select name="product_category">
                <option value="{{ $product->product_category }}">{{ $product->product_category }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->category }}">{{ $category->category }}</option>
                @endforeach
            </select>
            <br><br>
            <input type="submit" value="Update Product" name="submit">
        </form>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
