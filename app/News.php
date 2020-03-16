<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'text',
        'description',
        'image'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_news');
    }

}
