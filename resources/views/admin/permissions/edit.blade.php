@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Editing permission: {{$permission->name}}</h2>

        {!! Form::model($permission, ['route'=>['admin.permissions.update', $permission->id], 'method'=>'put']) !!}

        @include('admin.permissions._form')

        {!! Form::submit('Save permission', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}




    </div>

@endsection