@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Books</h2>

        <a href="{{route('admin.books.create')}}">Create</a>

        <br>
        <br>

        <table class="table table-bordered">
            <thead>
            <th>Title</th>
            <th>Author</th>
            <th>Action</th>
            </thead>
            <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{$book->title}}</td>
                <td>{{$book->author->name}}</td>
                <td>

                <a href="{{route('admin.books.edit',['id'=>$book->id])}}" class="btn btn-default">
                    Edit
                </a>

                    <a href="{{route('admin.books.chapters.index',['id'=>$book->id])}}" class="btn btn-default">
                        Chapters
                    </a>

                    <a href="{{route('admin.books.destroy',['id'=>$book->id])}}" class="btn btn-danger">
                        Destroy
                    </a>

                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection