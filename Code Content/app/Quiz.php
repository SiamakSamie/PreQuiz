<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    public function Comments() {
         return $this->hasMany('App\Comment');
     }
     
     public function User() {
         return $this->belongsTo('App\User');
     }
     
     public function Questions() {
         return $this->hasMany('App\Questions');
     }
}
