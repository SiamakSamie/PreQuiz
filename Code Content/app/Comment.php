<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     public function Quiz() {
         return $this->belongsTo('App\Quiz');
     }
     
     public function User() {
         return $this->belongsTo('App\User');
     }
     
     public function Vote() {
          return $this->hasMany('App\Vote');
     }
     
     public function Notification() {
          return $this->hasMany('App\Notification');
     }
}
