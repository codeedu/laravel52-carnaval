<?php

namespace CodePub\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = [
        'name',
        'content',
        'order'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
