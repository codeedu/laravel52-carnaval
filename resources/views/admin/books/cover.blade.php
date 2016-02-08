@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Cover of: {{$book->title}}</h2>

        @if(file_exists(public_path('/books/thumbs/' . $book->id . '.jpg')))
            <img src="/books/thumbs/{{$book->id}}.jpg">
        @endif

        {!! Form::open(['route'=>['admin.books.cover.store', $book->id], 'enctype'=>'multipart/form-data']) !!}

        <div class="form-group">
            {!! Form::label('file', 'Cover:') !!}
            {!! Form::file('file', null, ['class'=>'form-control']) !!}
        </div>

        {!! Form::submit('Upload', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
<br>
        <a href="{{route('admin.books.index')}}" class="btn btn-sm btn-default">Back</a>


    </div>

@endsection