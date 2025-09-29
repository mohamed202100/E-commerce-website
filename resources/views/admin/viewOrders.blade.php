@extends('admin.mainDesign')

@section('view-orders')
    @extends('admin.mainDesign')

@section('view-category')
    @if (session('update'))
        <div
            style="border: 1px solid rgb(43, 43, 162); color: white; border-radius: 4px rounded; padding: 10px;
        background-color: rgb(38, 199, 49); margin-bottom: 10px;">
            {{ session('update') }}
        </div>
    @endif
    <table style="width: 100%; border-collapse: collapse; font-family: arial, sans-serif;">
        <thead>
            <tr style="background-color: #f2f2f2">
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Customer Name</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Customer Address</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Customer Phone</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Product</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Price</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Image</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd" colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr style="border-bottom: 1px solid #ddd">
                    <td style="padding: 12px;">{{ $order->user->name }}</td>
                    <td style="padding: 12px;">{{ $order->address }}</td>
                    <td style="padding: 12px;">{{ $order->phone }}</td>
                    <td style="padding: 12px;">{{ $order->product->product_title }}</td>
                    <td style="padding: 12px;">{{ $order->product->product_price }}</td>
                    <td style="padding: 12px;"><img style="width:100px;height:100px;max-width:100%"
                            src="{{ asset('products/' . $order->product->product_image) }}" alt=""></td>
                    <td>
                        <form action="{{ route('products.delete', $order->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <input type="submit" value="Delete" name="delete" class="btn btn-danger"
                                onclick="return confirm('Are You Sure?')">
                        </form>
                        <a href="{{ route('products.edit', $order->id) }}" style="color: green">Edit</a>
                    </td>
                </tr>
            @endforeach
    </table>
@endsection

@endsection
