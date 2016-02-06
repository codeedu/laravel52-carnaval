@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Create new Role</h2>

        {!! Form::open(['route'=>'admin.roles.store']) !!}

        @include('admin.roles._form')

        {!! Form::submit('Add role', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}




    </div>

@endsection