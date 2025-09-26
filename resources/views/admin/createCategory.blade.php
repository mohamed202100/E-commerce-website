@extends('admin.mainDesign')

@section('add-category')
    @if (session('category_message'))
        <div
            style="border: 1px solid blue; color: white; border-radius: 4px rounded; padding: 10px;
        background-color: green; margin-bottom: 10px;">
            {{ session('category_message') }}
        </div>
    @endif
    <div class="container-fluid">
        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <input type="text" name="category">
            <input type="submit" value="Add Category" name="submit">
        </form>
    </div>
@endsection
