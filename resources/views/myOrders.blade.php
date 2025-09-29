<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
                <table style="width: 100%; border-collapse: collapse; font-family: arial, sans-serif;">
                    <thead>
                        <tr style="background-color: #f2f2f2">
                            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Your Name</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Your Address
                            </th>
                            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Your Phone
                            </th>
                            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Product</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Price</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Image</th>
                            <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Action</th>
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
                                        src="{{ asset('products/' . $order->product->product_image) }}" alt="">
                                </td>
                                <td style="padding: 12px;">{{ $order->status }}</td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
