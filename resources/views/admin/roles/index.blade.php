@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Roles</h2>

        <a href="{{route('admin.roles.create')}}">Create</a>

        <br>
        <br>

        <table class="table table-bordered">
            <thead>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
            </thead>
            <tbody>
            @foreach($roles as $role)
            <tr>
                <td>{{$role->name}}</td>
                <td>{{$role->description}}</td>
                <td>

                <a href="{{route('admin.roles.edit',['id'=>$role->id])}}" class="btn btn-default">
                    Edit
                </a>

                    <a href="{{route('admin.roles.permissions',['id'=>$role->id])}}" class="btn btn-default">
                        Permissions
                    </a>

                    <a href="{{route('admin.roles.destroy',['id'=>$role->id])}}" class="btn btn-danger">
                        Destroy
                    </a>

                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection