@extends('layout.app')
@section('title','Edit User')
@section('content')

    <div class="col-lg-6">
        <form class="form" action="/users/{{ $user->id }}/update" method="post">
            @method('POST')
            @csrf
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="Please input name" value="{{ $user->name }}">
            <br>
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Please input email" value="{{ $user->email }}">
            <br>
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password"
                   placeholder="Please input password">
            <br>
            <label for="password_confirm">Confirm Password</label>
            <input class="form-control" type="password" name="password_confirm" id="password_confirm"
                   placeholder="Please confirm password">
            <br>
            <label for="role">Role</label>
            <select class="form-control" name="role" id="role">
                <option value="0" @if($user->is_admin == 0) selected @endif>Client</option>
                <option value="1" @if($user->is_admin == 1) selected @endif>Admin</option>
            </select>
            <br>
            <input class="btn btn-info" type="submit" name="submit" value="Save">
        </form>
    </div>

@endsection
