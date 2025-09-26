@extends('admin.mainDesign')

@section('add-product')
    <div class="container-fluid">
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="product_title" placeholder="Enter Product Title">
            <br><br>
            <textarea name="product_description" placeholder="Product Desc">
            </textarea><br><br>
            <input type="number" name="product_quantity" placeholder="Enter The Quantity">
            <br><br><input type="number" name="product_price" placeholder="Enter The Price">
            <br><br><input type="file" name="product_image" value="Upload Image">
            <br><br><select name="product_category">
                @foreach ($categories as $category)
                    <option value="{{ $category->category }}">{{ $category->category }}</option>
                @endforeach
            </select>
            <br><br>
            <input type="submit" value="Add Product" name="submit">
        </form>
    </div>
@endsection
