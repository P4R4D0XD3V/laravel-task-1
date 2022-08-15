@extends('layout.app')
@section('title','Product Edit')
@section('content')

    <div class="col-lg-6">
        <form class="form" action="/products/{{ $product->id }}/update" method="post">
            @method('POST')
            @csrf
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" placeholder="Please input name" value="{{ $product->name }}">
            <br>
            <label for="short">Short Description</label>
            <textarea class="form-control" name="short" id="short" cols="30" rows="5" placeholder="Please input short description">{{ $product->short }}</textarea>
            <br>
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Please input description">{{ $product->description }}</textarea>
            <br>
            <label for="category">Category</label>
            <select class="form-control" name="category" id="category">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($product->category->id == $category->id) selected @endif> {{ $category->name }}</option>
                @endforeach
            </select>
            <br>
            <input class="btn btn-info" type="submit" name="submit" value="Save">
        </form>
    </div>

@endsection
