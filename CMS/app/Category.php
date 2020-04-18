<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

//relationship between posts table and category model on category_id field

public function posts()
{
    return $this->hasMany(Post::class);
}
}
