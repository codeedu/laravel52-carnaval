@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Permissions</h2>

        <a href="{{route('admin.permissions.create')}}">Create</a>

        <br>
        <br>

        <table class="table table-bordered">
            <thead>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
            </thead>
            <tbody>
            @foreach($permissions as $permission)
            <tr>
                <td>{{$permission->name}}</td>
                <td>{{$permission->description}}</td>
                <td>

                <a href="{{route('admin.permissions.edit',['id'=>$permission->id])}}" class="btn btn-default">
                    Edit
                </a>

                    <a href="{{route('admin.permissions.destroy',['id'=>$permission->id])}}" class="btn btn-danger">
                        Destroy
                    </a>

                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection