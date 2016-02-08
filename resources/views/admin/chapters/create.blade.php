@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Create new Chapter</h2>

        {!! Form::open(['route'=>['admin.books.chapters.store', $book->id]]) !!}

        @include('admin.chapters._form')

        {!! Form::submit('Add chapter', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}




    </div>

@endsection