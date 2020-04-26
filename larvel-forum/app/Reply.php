<?php

namespace App;


class Reply extends Model
{
    public function owner()
    {
        // user relationship on user_id as forign key
       return $this->belongsTo(User::class, 'user_id');
    }

    public function discussion()
    {
        // discussion relationship
        $this->belongsTo(Discussion::class);
    }
}
