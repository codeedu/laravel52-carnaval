<?php

namespace CodePub\Http\Controllers;

use CodePub\Models\Book;
use CodePub\Models\Category;
use CodePub\Models\Order;
use CodePub\Services\OrderService;
use Illuminate\Http\Request;

use CodePub\Http\Requests;
use CodePub\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class StoreController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $books = Book::home()->get();

        return view('store.home', compact('books', 'categories'));
    }

    public function view($slug)
    {
        $categories = Category::all();
        $book = Book::findBySlug($slug);
        return view('store.book', compact('book', 'categories'));
    }

    public function category($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $books = $category->books()->where('published', 1)->get();

        return view('store.category', compact('category', 'categories', 'books'));
    }

    public function search()
    {
        $str = Input::get('str');
        $categories = Category::all();
        $books = Book::like('title', $str)->get();
        return view('store.search', compact('categories', 'books'));
    }

    public function checkout($id)
    {
        $book = Book::findOrFail($id);
        return view('store.checkout', compact('book'));
    }

    public function process($id)
    {
        $book = Book::findOrFail($id);

        $token = Input::get('stripeToken');

        $user = auth()->user();

        $orderService = app()->make(OrderService::class);
        $status = $orderService->process($book, $user, $token);

        return view('store.process', compact('book', 'status'));
    }

    public function orders()
    {
        $orders = Order::whereUserId(auth()->user()->id)->get();
        //$orders = auth()->user()->orders;

        return view('store.orders', compact('orders'));
    }

    public function download($id)
    {
        $order = Order::find($id);
        if ($order->user_id == auth()->user()->id) {

            $book = $order->book;

            if (file_exists(storage_path("books/{$book->id}/book.zip"))) {
                return response()->download(storage_path("books/{$book->id}/book.zip"));
            }
        }
    }

}
