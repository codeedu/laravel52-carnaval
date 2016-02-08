@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Chapters of: {{$book->title}}</h2>

        <a href="{{route('admin.books.chapters.create',['id'=>$book->id])}}">Create</a>

        <br>
        <br>

        <table class="table table-bordered">
            <thead>
            <th>Name</th>
            <th>Action</th>
            </thead>
            <tbody>
            @foreach($chapters as $chapter)
            <tr>
                <td>{{$chapter->name}}</td>
                <td>

                <a href="{{route('admin.books.chapters.edit',['id'=>$book->id,'chapter_id'=>$chapter->id])}}" class="btn btn-default">
                    Edit
                </a>

                    <a href="{{route('admin.books.chapters.destroy',['id'=>$book->id,'chapter_id'=>$chapter->id])}}" class="btn btn-danger">
                        Destroy
                    </a>

                </td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection