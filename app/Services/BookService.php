<?php

namespace CodePub\Services;

use CodePub\Models\BookInterface;
use CodePub\Util\ExtendedZip;
use Folklore\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Imagine\Image\Box;
use Symfony\Component\Yaml\Dumper;
use Symfony\Component\Yaml\Parser;


class BookService
{

    /**
     *
     */
    private $parser;
    /**
     *
     */
    private $dumper;

    public function __construct(Parser $parser, Dumper $dumper)
    {
        $this->parser = $parser;
        $this->dumper = $dumper;
    }

    public function storeCover(BookInterface $book, $cover)
    {
        Storage::disk('book_local')->put("{$book->id}/Resources/Templates/ebook/cover.jpg",
            File::get($cover));
        Storage::disk('book_local')->put("{$book->id}/Resources/Templates/cover.jpg",
            File::get($cover));

        $print_path = storage_path("books/{$book->id}/Resources/Templates/print");

        if (!is_dir($print_path)) {
            mkdir($print_path, 0775, true);
        }

        $img = new \Imagick(storage_path("books/{$book->id}/Resources/Templates/ebook/cover.jpg"));
        $img->setImageFormat("pdf");
        $img->writeImage(storage_path("books/{$book->id}/Resources/Templates/print/cover.pdf"));

        $thumbnail = \Image::open(storage_path("books/{$book->id}/Resources/Templates/ebook/cover.jpg"))
            ->thumbnail(new Box(356, 522));
        $thumbnail->save(public_path("books/thumbs/{$book->id}.jpg"));

        $thumbnail = \Image::open(storage_path("books/{$book->id}/Resources/Templates/ebook/cover.jpg"))
            ->thumbnail(new Box(138, 230));
        $thumbnail->save(public_path("books/thumbs/{$book->id}_small.jpg"));
    }

    public function export(BookInterface $book)
    {
        $this->exportContent($book);
        $config = $this->parser->parse(file_get_contents(storage_path('books/template/config.yml')));
        $config['book']['title'] = $book->title;
        $config['book']['author'] = $book->author->name;

        file_put_contents(storage_path("books/{$book->id}/Contents/dedication.md"), $book->dedication);

        foreach ($this->getChapters($book) as $chapter) {
            $ch['element'] = "chapter";
            $ch['number'] = $chapter->order;
            $ch['content'] = $chapter->order . ".md";
            array_push($config['book']['contents'], $ch);
        }

        $yml = $this->dumper->dump($config, 4);

        file_put_contents(storage_path("books/{$book->id}/config.yml"), $yml);
    }

    public function compress(BookInterface $book)
    {
        if (is_dir(storage_path("books/{$book->id}/Output"))) {
            ExtendedZip::zipTree(storage_path("books/{$book->id}/Output"),
                storage_path("books/{$book->id}/book.zip"),
                ExtendedZip::CREATE
            );
        }
    }

    private function getChapters(BookInterface $book)
    {
        return $book->chapters()->orderBy('order', 'asc')->get();
    }

    private function exportContent(BookInterface $book)
    {
        if (!is_dir(storage_path("books/{$book->id}/Contents/"))) {
            mkdir(storage_path("books/{$book->id}/Contents/"), 0775, true);
        }
        foreach ($this->getChapters($book) as $chapter) {
            file_put_contents(storage_path("books/{$book->id}/Contents/{$chapter->order}.md"), $chapter->content);
        }
    }

}