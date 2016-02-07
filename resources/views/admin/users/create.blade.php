@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Create new User</h2>

        {!! Form::open(['route'=>'admin.users.store']) !!}

        @include('admin.users._form')

        {!! Form::submit('Add user', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}




    </div>

@endsection