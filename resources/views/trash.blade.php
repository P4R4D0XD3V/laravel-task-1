@extends('layout.app')
@section('title','Trash Page')
@section('content')

    @if(count($users) > 0)
        <div class="mt-3">
            <table class="table table-responsive-md">
                <tr class="d-table-row">
                    <th>N</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Setting</th>
                </tr>
                @php $count = 1 @endphp
                @foreach($users as $user)
                    <tr class="d-table-row">
                        <td>{{ $count }}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>@if($user->is_admin)
                                admin
                            @else
                                client
                            @endif</td>
                        <td><a class="btn btn-outline-success" href="/users/restore/{{$user->id}}">Recover</a> / <a
                                class="btn btn-danger" href="/users/force-delete/{{$user->id}}">Delete</a></td>
                    </tr>
                    @php $count++ @endphp
                @endforeach
            </table>
        </div>
    @endif

    @if(count($products) > 0)
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
                        <td><a class="btn btn-outline-success" href="/products/restore/{{$product->id}}">Recover</a> /
                            <a
                                class="btn btn-danger" href="/products/force-delete/{{$product->id}}">Delete</a></td>
                    </tr>
                    @php $count++ @endphp
                @endforeach
            </table>
        </div>
    @endif

    @if(count($categories) > 0)
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
                        <td><a class="btn btn-outline-success" href="/categories/restore/{{$category->id}}">Recover</a>
                            / <a
                                class="btn btn-danger" href="/categories/force-delete/{{$category->id}}">Delete</a></td>
                    </tr>
                    @php $count++ @endphp
                @endforeach
            </table>
        </div>
    @endif

@endsection

