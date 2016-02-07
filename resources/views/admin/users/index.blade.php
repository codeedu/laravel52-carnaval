@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Users</h2>

        @can('user_add')
        <a href="{{route('admin.users.create')}}">Create</a>
        @endcan
        <br>
        <br>

        <table class="table table-bordered">
            <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>

                        @can('user_edit')
                        <a href="{{route('admin.users.edit',['id'=>$user->id])}}" class="btn btn-default">
                            Edit
                        </a>
                        @endcan

                        @can('user_view_roles')
                        <a href="{{route('admin.users.roles',['id'=>$user->id])}}" class="btn btn-default">
                            Roles
                        </a>
                        @endcan

                        @can('user_destroy')
                        <a href="{{route('admin.users.destroy',['id'=>$user->id])}}" class="btn btn-danger">
                            Destroy
                        </a>
                        @endcan

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection