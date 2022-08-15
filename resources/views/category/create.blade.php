@extends('layout.app')
@section('title','Create Category')
@section('content')

    <div class="col-lg-6">
        <form class="form" action="/categories/store" method="post">
            @method('POST')
            @csrf
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="Please input name">
            <br>
            <input class="btn btn-info" type="submit" name="submit" value="Create">
        </form>
    </div>

@endsection
