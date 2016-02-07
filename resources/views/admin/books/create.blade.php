@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Create new Book</h2>

        {!! Form::open(['route'=>'admin.books.store']) !!}

        @include('admin.books._form')

        {!! Form::submit('Add book', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}




    </div>

@endsection