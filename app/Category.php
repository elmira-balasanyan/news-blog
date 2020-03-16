<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'field',
        'image'
    ];

    public function news()
    {
        return $this->belongsToMany(News::class, 'category_news');
    }
}
