<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function Comments() {
        return $this->hasMany('App\Comment');
    }
}
