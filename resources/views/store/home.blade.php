@extends('layouts.app')

@section('banner')
    @include('store._banner')
@endsection

@section('menu')
    @include('store._menu')
@endsection

@section('content')
    <div class="content col-md-9">
        <h2>Featured Books</h2>

        <div class="col-md-12">
            @foreach($books as $book)
                <div class="col-md-2 book-home">
                    <a href="{{route('store.view',['slug'=>$book->slug])}}">
                        <img src="/books/thumbs/{{$book->id}}_small.jpg">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection