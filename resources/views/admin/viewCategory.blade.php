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
    <table style="width: 100%; border-collapse: collapse; font-family: arial, sans-serif;">
        <thead>
            <tr style="background-color: #f2f2f2">
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Category ID</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd">Category Name</th>
                <th style="padding: 12px; text-align: left; border-bottom: 1px solid #ddd" colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr style="border-bottom: 1px solid #ddd">
                    <td style="padding: 12px;">{{ $category->id }}</td>
                    <td style="padding: 12px;">{{ $category->category }}</td>
                    <td style="padding: 12px;">
                        <form action="{{ route('categories.delete', $category->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <input type="submit" value="Delete" name="delete" class="btn btn-danger"
                                onclick="return confirm('Are You Sure?')">
                        </form>
                        <a href="{{ route('categories.edit', $category->id) }}" style="color: green">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
