@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Editing book: {{$book->title}}</h2>

        {!! Form::model($book, ['route'=>['admin.books.update', $book->id], 'method'=>'put']) !!}

        @include('admin.books._form')

        {!! Form::submit('Save book', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}




    </div>

@endsection