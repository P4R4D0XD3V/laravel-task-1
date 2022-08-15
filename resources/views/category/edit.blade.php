@extends('layout.app')
@section('title','Category Edit')
@section('content')

    <div class="col-lg-6">
        <form class="form" action="/categories/{{ $category->id }}/update" method="post">
            @method('POST')
            @csrf
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="Please input name" value="{{ $category->name }}">
            <br>
            <input class="btn btn-info" type="submit" name="submit" value="Save">
        </form>
    </div>


@endsection
