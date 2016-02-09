<?php

namespace CodePub\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Book extends Model implements BookInterface, SluggableInterface
{

    use  SluggableTrait;

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

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

    public function scopePublished($query)
    {
        return $query->where('published',1);
    }

    public function scopeHome($query)
    {
        return $query->where('published',1)->take(12)->orderBy('id','desc');
    }

    public function scopeLike($query, $field, $value)
    {
        return $query->where($field,'LIKE',"%{$value}%");
    }


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
