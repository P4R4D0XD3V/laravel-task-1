@extends('layout.app')
@section('title','Home Page')
@section('content')

        @foreach($products as $product)
            <h1>{{ $product->name }}</h1><br>
            <div>
                Blog category is <a href="/categories/{{ $product->category->slug }}">{{ $product->category->name }}</a> and created by <a href="/users/{{ $product->user->name }}">{{ $product->user->name }}</a>
            </div>

            <div>
                <p>{{ $product->short }}</p>
            </div>
            <div>
                <p>{{ $product->description }}</p>
            </div>
        @endforeach


@endsection

