@extends('admin.mainDesign')

@section('edit-category')
    <div class="container-fluid">
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @method('put')
            @csrf
            <input type="text" name="category" value="{{ $category->category }}">
            <input type="submit" value="Update Category" name="update">
        </form>
    </div>
@endsection
