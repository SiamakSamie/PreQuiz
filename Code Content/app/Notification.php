<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function To_User(){
        return $this->belongsTo("App\User", 'to_user_id');
    }
    
    public function From_User(){
        return $this->belongsTo("App\User", 'from_user_id');
    }
    
    public function Quiz(){
        return $this->belongsTo("App\Quiz");   
    }
    
    public function Comment() {
        return $this->belongsTo("App\Comment");
    }
}
