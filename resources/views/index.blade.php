@extends('layout.app')
@section('title','Login Page')
@section('content')

<div class="container mt-4 pt-4">
    <div class="row justify-content-center mt-4 pt-4">
        <div class="col-lg-4 mt-4 pt-4">
            <form action="/login" class="form mt-4 pt-4" method="post">
                @method('POST')
                @csrf
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Please input email address">
                <br>
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Please input password">
                <br>
                <input type="submit" class="btn btn-outline-success" value="Login">
            </form>
        </div>
    </div>
</div>

@endsection

