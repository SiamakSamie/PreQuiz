<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    public function Quiz() {
         return $this->belongsTo('App\Quiz');
     }
}
