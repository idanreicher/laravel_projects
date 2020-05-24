<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    // 1 to 1 relationship room has 1 type

    public function room(){

        return $this->hasOne('App\Room');

    }

    // 1 to many relationship many rooms associaetd with 1 type

    public function rooms(){

        return $this->hasMany('App\Room', 'id', 'room_type_id');

    }

}
