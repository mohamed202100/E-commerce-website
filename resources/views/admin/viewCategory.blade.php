@extends('admin.mainDesign')

@section('view-category')
    <table style="width: 100%; border-collapse: collapse; font-family: arial, sans-serif;">
        <thead>
            <tr style="background-color: #f2f2f2">
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Category ID</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Category Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr style="border-bottom: 1px solid #ddd">
                    <th style="padding: 12px;">{{ $category->id }}</th>
                    <th style="padding: 12px;">{{ $category->category }}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
