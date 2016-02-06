@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Permissions of: {{$role->name}}</h2>
        <br>
        <h3>Add new permission</h3>
        {!! Form::open(['route'=>['admin.roles.permissions.store', $role->id]]) !!}
        <select name="permission_id" class="form-control">
            @foreach($permissions as $permission)
                <option value="{{$permission->id}}">{{$permission->name}}</option>
            @endforeach
        </select>
        <br>
        {!! Form::submit('Add permission', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}

        <br>


        <table class="table table-bordered">
            <thead>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
            </thead>
            <tbody>
            @foreach($role->permissions as $permission)
                <tr>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->description}}</td>
                    <td>

                        <a href="{{route('admin.roles.permissions.revoke', ['id'=>$role->id, 'permission_id'=>$permission->id])}}"
                           class="btn btn-danger">Revoke</a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{route('admin.roles.index')}}">Back</a>
    </div>

@endsection