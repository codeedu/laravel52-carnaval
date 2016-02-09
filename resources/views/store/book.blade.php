@extends('layouts.app')

@section('content')
    <section class="container info">
        <article class="col-md-4">
            <h2>{{$book->title}}</h2>

            <div class="author">
                <img src="http://www.gravatar.com/avatar/{{md5($book->author->email)}}?s=30" alt="{{$book->author->name}}">
                <p>{{$book->author->name}}</p>
            </div>

            <p>
                {{$book->description}}
            </p>

        </article>

        <div class="col-md-4 text-center">
            <img src="/books/thumbs/{{$book->id}}.jpg" class="book" alt="Livro" title="Livro">
            <div class="col-md-12">
                <div class="progress progress-book">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60"
                         aria-valuemin="0" aria-valuemax="100" style="width: {{$book->percent_complete}}%;">
                        <span class="sr-only">60% Complete</span>
                    </div>
                </div>
                <p>This book is {{$book->percent_complete}}% complete</p>

            </div>
        </div>

        <aside class="col-md-4 text-center">
            <div class="col-md-5 col-md-offset-1">
                <p class="price">$ {{$book->price}}</p>
            </div>
            <div class="pull-right">
                <a href="{{route('store.checkout',['id'=>$book->id])}}" class="btn btn-success btn-cpr ">Purchase now</a>
            </div>

            <div class="col-md-12">
                <hr>
                <p>
                    @foreach($book->chapters as $chapter)
                        {{$chapter->name}}<br>
                    @endforeach
                </p>
            </div>

        </aside>
    </section>

@endsection
