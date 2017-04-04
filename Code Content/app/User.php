<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    public function Score() {
         return $this->hasMany('App\Score');
     }

    public function Comments() {
         return $this->hasMany('App\Comment');
    }
    
    public function Quizzes() {
        return $this->hasMany('App\Quiz');
    }
    
     public function Vote() {
          return $this->hasMany('App\Vote');
     }

     public function Send_Notification(){
        return $this->hasMany('App\Notification', 'to_user_id');
    }
    
    public function Receive_Notification(){
        return $this->hasMany('App\Notification', 'from_user_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'university'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
