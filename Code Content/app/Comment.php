<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     public function Course() {
         return $this->belongsTo('App\Course');
     }
     
     public function User() {
         return $this->belongsTo('App\User');
     }
}
