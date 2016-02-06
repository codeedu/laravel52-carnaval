@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Editing role: {{$role->name}}</h2>

        {!! Form::model($role, ['route'=>['admin.roles.update', $role->id], 'method'=>'put']) !!}

        @include('admin.roles._form')

        {!! Form::submit('Save role', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}




    </div>

@endsection