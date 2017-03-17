<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public function Comments() {
         return $this->hasMany('App\Comment');
     }
}
