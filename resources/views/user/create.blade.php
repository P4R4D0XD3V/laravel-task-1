@extends('layout.app')
@section('title','Create User')
@section('content')

    <div class="col-lg-6">
        <form class="form" action="/users/store" method="post">
            @method('POST')
            @csrf
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="Please input name">
            <br>
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" placeholder="Please input email">
            <br>
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password"
                   placeholder="Please input password">
            <br>
            <label for="password_confirmation">Confirm Password</label>
            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation"
                   placeholder="Please confirm password">
            <br>
            <label for="role">Role</label>
            <select class="form-control" name="role" id="role">
                <option value="0">Client</option>
                <option value="1">Admin</option>
            </select>
            <br>
            <input class="btn btn-info" type="submit" name="submit" value="Create">
        </form>
    </div>

@endsection
