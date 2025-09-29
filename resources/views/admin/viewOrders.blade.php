@extends('admin.mainDesign')

@section('view-orders')
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
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Action</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">PDF</th>
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
                    <td style="padding: 12px;">
                        <form action="{{ route('order.changestatus', $order->id) }}" method="post">
                            @method('put')
                            @csrf
                            <select name="status">
                                @if ($order->status == 'pending')
                                    <option selected value="pending">Pending</option>
                                    <option value="delivered">Delivered</option>
                                @else{
                                    <option selected value="delivered">Delivered</option>
                                    <option value="pending">Pending</option>
                                    }
                                @endif
                            </select>
                            <input type="submit" value="Submit" name="submit" onclick="return confirm('Are You Sure?')">
                        </form>
                    </td>
                    <td style="padding: 12px;">
                        <a href="{{ route('downloadpdf', $order->id) }}" class="btn btn-primary">Download PDF</a>
                    </td>
                </tr>
            @endforeach
    </table>
@endsection
