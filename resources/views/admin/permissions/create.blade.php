@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Create new Permission</h2>

        {!! Form::open(['route'=>'admin.permissions.store']) !!}

        @include('admin.permissions._form')

        {!! Form::submit('Add permission', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}




    </div>

@endsection