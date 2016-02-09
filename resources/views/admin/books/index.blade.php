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

                        <a href="{{route('admin.books.edit',['id'=>$book->id])}}" class="btn btn-default btn-sm">
                            Edit
                        </a>

                        <a href="{{route('admin.books.cover',['id'=>$book->id])}}" class="btn btn-sm btn-default">
                            Cover
                        </a>

                        <a href="{{route('admin.books.chapters.index',['id'=>$book->id])}}" class="btn btn-sm btn-default">
                            Chapters
                        </a>

                        <a href="{{route('admin.books.export',['id'=>$book->id])}}" class="btn btn-sm btn-default">
                            Export
                        </a>

                        @if(file_exists(storage_path("books/{$book->id}/book.zip")))
                        <a href="{{route('admin.books.download',['id'=>$book->id])}}" class="btn btn-sm btn-primary">
                            Download
                        </a>
                        @endif

                        <a href="{{route('admin.books.destroy',['id'=>$book->id])}}" class="btn btn-sm btn-danger">
                            Destroy
                        </a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection