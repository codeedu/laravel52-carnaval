@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Managing Roles for the User: {{$user->name}}</h2>

        @can('user_add_role')
        {!! Form::open(['route'=>['admin.users.roles.store', $user->id]]) !!}
        <select name="role_id" class="form-control">
            @foreach($roles as $role)
                @if(!$user->hasRole($role->name))
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endif
            @endforeach
        </select>
        <br>
        {!! Form::submit('Add role', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
        @endcan
        <br>

        <h3>Listing roles:</h3>
        <table class="table table-bordered">
            <thead>
            <th>Role</th>
            <th>Description</th>
            @can('user_revoke_role')
            <th>Action</th>
            @endcan
            </thead>
            <tbody>
            @foreach($user->roles as $role)
                <tr>
                    <td>{{$role->name}}</td>
                    <td>{{$role->description}}</td>
                    @can('user_revoke_role')
                    <td>

                        <a href="{{route('admin.users.roles.revoke',['id'=>$user->id, 'role_id'=>$role->id])}}"
                           class="btn btn-danger">
                            Revoke
                        </a>

                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>

        <a href="{{route('admin.users.index')}}">Back</a>

    </div>

@endsection
