@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Editing chapter: {{$chapter->name}}</h2>

        {!! Form::model($chapter, ['route'=>['admin.books.chapters.update', $book->id,'chapter_id'=>$chapter->id], 'method'=>'put']) !!}

        @include('admin.chapters._form')

        {!! Form::submit('Save chapter', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}

    </div>

@endsection