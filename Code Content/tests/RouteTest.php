<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class RouteTest extends TestCase
{
    use DatabaseTransactions;
    
    public function testMainPage(){
        $this->visit('/')
             ->see('Enter the name of your institution')
             ->dontSee('Rails');
    }
    
    
    public function testContactUs()
    {
    $this->visit('/')
         ->click('Contact us')
         ->seePageIs('/contact_us');
    }
    
    
   

//     public function testDatabase()
// {
//     $user = factory(App\User::class)->make([
//         // 'name' => $faker->name,
//         // 'email' => $faker->email,
//         // 'password' => str_random(10),
//         // 'remember_token' => str_random(10),
//     ]);

//     $this->visit('/')
//          ->click('Create a quiz')
//          -> see('Feature Unavailable')
//          ->seePageIs('/create_quiz')
//         ;
// }
    
    // public function testCreateQuiz()
    // {
    // $this->visit('/')
    //      ->click('Create a quiz')
    //      -> see('Feature Unavailable')
    //      ->seePageIs('/create_quiz')
    //     ;
    // }
    
}
     