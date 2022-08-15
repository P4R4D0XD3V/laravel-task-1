@extends('layout.app')
@section('title','Users Page')
@section('content')

    <div class="mt-3">
        <a class="btn btn-warning" href="/users/create">Create</a>
    </div>

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
                    <td>@if($user->is_admin)admin @else client @endif</td>
                    <td><a class="btn btn-warning" href="/users/edit/{{$user->id}}">Edit</a> / <a class="btn btn-danger" href="/users/delete/{{$user->id}}">Delete</a> </td>
                </tr>
                @php $count++ @endphp
            @endforeach
        </table>
    </div>

@endsection
