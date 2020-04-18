<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description' ,
        'image' ,
        'content',
        'category_id',
        'published_at'
    ];

    public function deleteImage(){

        Storage::delete($this->image);

    }

    //relationship between posts table and category model on category_id field

    public function category()
    {
        return $this->BelongsTo(Category::class);
    }

    //relationship between posts table and tag model on tad_id field

    public function tags()
    {
       return $this->belongsToMany(Tag::class);
    }

    // check if a post has tags
    public function hasTags($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray());
    }
}
