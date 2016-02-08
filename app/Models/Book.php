<?php

namespace CodePub\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model implements BookInterface
{
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'subtitle',
        'dedication',
        'description',
        'website',
        'percent_complete',
        'price',
        'published'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}
