@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Editing category: {{$category->name}}</h2>

        {!! Form::model($category, ['route'=>['admin.categories.update', $category->id], 'method'=>'put']) !!}

        @include('admin.categories._form')

        {!! Form::submit('Save category', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}




    </div>

@endsection