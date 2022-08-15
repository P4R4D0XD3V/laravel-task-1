@extends('layout.app')
@section('title','Category Page')
@section('content')


    <div class="mt-3">
        <a class="btn btn-warning" href="/categories/create">Create</a>
    </div>

    <div class="mt-3">
        <table class="table table-responsive-md">
            <tr class="d-table-row">
                <th>N</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Product Count</th>
                <th>Setting</th>
            </tr>
            @php $count = 1 @endphp
            @foreach($categories as $category)
                <tr class="d-table-row">
                    <td>{{ $count }}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{count($category->products)}}</td>
                    <td><a class="btn btn-warning" href="/categories/edit/{{$category->id}}">Edit</a> / <a class="btn btn-danger"  href="/categories/delete/{{$category->id}}">Delete</a> </td>
                </tr>
                @php $count++ @endphp
            @endforeach
        </table>
    </div>

@endsection
