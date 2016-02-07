@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Create new Category</h2>

        {!! Form::open(['route'=>'admin.categories.store']) !!}

        @include('admin.categories._form')

        {!! Form::submit('Add category', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}




    </div>

@endsection