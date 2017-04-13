<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use \App\User;

class RouteTest extends TestCase
{
    use DatabaseTransactions;
    
    public function testGuestMainPage(){
        $this->visit('/')
             ->see('Enter the name of your institution')
             ->dontSee('Rails');
    }
    
    public function testContactUs() {
    $this-> visit('/')
         ->click('menu')
         ->click('Contact us')
         ->seePageIs('/contact_us')
         -> see('fill out this form')
         ->dontSee('Aveeno');
    }
    
  public function testAboutUs(){
      $this->visit('/')
           ->click('menu')
           ->click('About us')
           ->seePageIs('/about_us')
           ->see('Our Team')
           ->dontSee('Orange');
  }
  
  public function testLogin(){
      $this->visit('/')
           ->click('login')
           ->seePageIs('/login')
           ->see('E-mail Address')
           ->dontSee('University');
  }
  
  public function testRegister(){
      $this->visit('/')
           ->click('register')
           ->seePageIs('/register')
           ->see('name')
           ->dontSee('Remember Me');
  }

    public function testNavigation(){
         $this->visit('/')
         ->click('menu')
         ->see('Menu options')
         ->dontSee('testing');
    }
  public function testSearchQuizNav(){
      $this->visit('/')
            ->click('menu')
            ->click('Search for a quiz')
            ->seePageIs('/');
  }
   
    public function testGuestCreateQuiz()  {
    $this->visit('/')
         ->click('menu')
         ->click('Create a quiz')
         ->dontSee('Question');
    }
    public function testGuestNotification(){
    $this->visit('/')
         ->click('menu')
         ->click('Notifications')
         ->dontSee('Questions');
    }
    
    public function testAuthNotification(){
          $user = factory(user::class)->create();
          $this->be($user);
          $this->visit('/')
                ->click('menu')
                ->click('Notifications')
                ->seePageIs('/notifications')
                ->see('Notifications')
                ->dontSee('login');
    }
    public function testAuthCreateQuiz(){
             $user = factory(user::class)->create();
             $this->be($user);
             $this->visit('/')
                ->click('menu')
                ->click('Create a quiz')
                ->seePageIs('/create_quiz')
                ->see('University Name')
                ->dontSee('Search for another quiz');
    }
    public function testAuthEditQuiz(){
         $user = factory(user::class)->create();
         $this->be($user);
         $this->visit('/')
              ->click('menu')
              ->click('Edit a quiz')
              ->seePageIs('/edit_quiz')
              //  ->see('My quizzes')
                ->dontSee('stalls');
    }
    public function testAuthMyProfile(){
         $user = factory(user::class)->create();
             $this->be($user);
             $this->visit('/')
                ->click('menu')
                ->click('My profile')
                ->seePageIs('/profile/0')  
                ->see('Profile information')
                ->dontSee('Spongebob') ;
    }
   public function testLogo(){
         $this->visit('/login')
             ->click('logo')
             ->seePageIs('/');
   }
    public function testAuthMainPage(){
         $user = factory(user::class)->create();
         $this->be($user);
         $this->visit('/')
             ->see($user->name)
             ->assertViewMissing('login');
    }
    
}
     
