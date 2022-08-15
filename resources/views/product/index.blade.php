@extends('layout.app')
@section('title','Products Page')
@section('content')
    <div class="mt-3">
        <a class="btn btn-warning" href="/products/create">Create</a>
    </div>

    <div class="mt-3">
        <table class="table table-responsive-md">
            <tr class="d-table-row">
                <th>N</th>
                <th>Name</th>
                <th>Category Name</th>
                <th>Author</th>
                <th>Slug</th>
                <th>Setting</th>
            </tr>
            @php $count = 1 @endphp
            @foreach($products as $product)
                <tr class="d-table-row">
                    <td>{{ $count }}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->user->name}}</td>
                    <td>{{$product->slug}}</td>
                    <td><a class="btn btn-warning" href="/products/edit/{{$product->id}}">Edit</a> / <a class="btn btn-danger" href="/products/delete/{{$product->id}}">Delete</a> </td>
                </tr>
                @php $count++ @endphp
            @endforeach
        </table>
    </div>
@endsection
