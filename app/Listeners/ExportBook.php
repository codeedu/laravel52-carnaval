<?php

namespace CodePub\Listeners;

use CodePub\Events\GenerateBook;
use CodePub\Services\BookService;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExportBook implements ShouldQueue
{
    use InteractsWithQueue;
    /**
     *
     */
    private $bookService;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(BookService $bookService)
    {
        //
        $this->bookService = $bookService;
    }

    /**
     * Handle the event.
     *
     * @param  GenerateBook  $event
     * @return void
     */
    public function handle(GenerateBook $event)
    {
        $book = $event->book;

            $this->bookService->export($book);
            exec("php ".base_path("easybook/book publish {$book->id} print"));
            exec("php ".base_path("easybook/book publish {$book->id} kindle"));
            exec("php ".base_path("easybook/book publish {$book->id} ebook"));


    }
}
