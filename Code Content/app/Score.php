<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
     
     public function User() {
         return $this->belongsTo('App\User');
     }
     
     public function Quiz() {
         return $this->belongsTo('App\Quiz');
     }
}
