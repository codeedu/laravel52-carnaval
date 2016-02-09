<?php

namespace CodePub\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        'price'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
