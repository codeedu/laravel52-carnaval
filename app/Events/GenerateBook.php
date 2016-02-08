<?php

namespace CodePub\Events;

use CodePub\Events\Event;
use CodePub\Models\BookInterface;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class GenerateBook extends Event
{
    use SerializesModels;
    /**
     *
     */
    public $book;

    /**
     * Create a new event instance.
     *
     * @param BookInterface $book
     */
    public function __construct(BookInterface $book)
    {
        //
        $this->book = $book;
    }

}
