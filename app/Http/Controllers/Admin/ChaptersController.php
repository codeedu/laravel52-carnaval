<?php

namespace CodePub\Http\Controllers\Admin;

use CodePub\Models\Book;
use CodePub\Models\Chapter;
use Illuminate\Http\Request;

use CodePub\Http\Requests;
use CodePub\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ChaptersController extends Controller
{
    public function index($id)
    {
        $book = Book::findOrFail($id);

        if (Gate::denies('manage', $book)) {
            abort(403, "you do not own this book");
        }

        $chapters = $book->chapters()->orderBy('order', 'asc')->get();
        return view('admin.chapters.index', compact('chapters', 'book'));
    }

    public function create($id)
    {
        $book = Book::findOrFail($id);

        if (Gate::denies('manage', $book)) {
            abort(403, "you do not own this book");
        }

        return view('admin.chapters.create', compact('book'));
    }

    public function store(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        if (Gate::denies('manage', $book)) {
            abort(403, "you do not own this book");
        }

        $book->chapters()->create($request->all());
        return redirect()->route('admin.books.chapters.index', ['id' => $book->id]);
    }

    public function edit($id, $chapter_id)
    {
        $book = Book::findOrFail($id);

        $chapter = Chapter::find($chapter_id);

        if (Gate::denies('manage', $chapter)) {
            abort(403, "you do not own this book/chapter");
        }
        return view('admin.chapters.edit', compact('chapter','book'));
    }

    public function update(Request $request, $id, $chapter_id)
    {
        $chapter = Chapter::find($chapter_id);

        if (Gate::denies('manage', $chapter)) {
            abort(403, "you do not own this book/chapter");
        }

        $chapter->update($request->all());
        return redirect()->route('admin.books.chapters.index',['id'=>$id]);
    }

    public function destroy($id, $chapter_id)
    {
        $chapter = Chapter::find($chapter_id);

        if (Gate::denies('manage', $chapter)) {
            abort(403, "you do not own this book/chapter");
        }

        $chapter->delete();

        return redirect()->route('admin.books.chapters.index',['id'=>$id]);
    }

}
