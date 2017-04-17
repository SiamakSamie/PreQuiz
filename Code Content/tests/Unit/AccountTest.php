<?php

namespace Tests\Unit;

use Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class AccountTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;
    
    public function testIncorrectRegistration(){
        $this->visit('/register')
            ->see('Register')
            ->type('1', 'name')
            ->type('1', 'university')
            ->type('test@test.test', 'email')
            ->type('testtesttest', 'password')
            ->type('testtesttest', 'password_confirmation')
            
            ->press('Register')
            ->seePageIs('/home')
            ->see('Get Started')
                ;
        Auth::logout();
        $this->visit('/register')
            ->see('Register')
            ->type('1', 'name')
            ->type('1', 'university')
            ->type('test@test.test', 'email')
            ->type('testtesttest', 'password')
            ->type('testtesttest', 'password_confirmation')
            
            ->press('Register')
            ->seePageIs('/register')
            ->see('The email has already been taken.')
                ;
    }
      public function testRegistration()// make sure this is new everytime, use factory
    {
        
        $this->visit('/register')
            ->see('Register')
            ->type('1', 'name')
            ->type('1', 'university')
            ->type('test@t1253est.test', 'email')
            ->type('testtesttest', 'password')
            ->type('testtesttest', 'password_confirmation')
            
            ->press('Register')
            ->seePageIs('/home')
            ->see('Get Started')
                ;
                
    }

    
    public function testIncorrectLogin()
    {
        $this->visit('/login')
            ->see('Login')
            ->type('test.test@test', 'email')
            ->type('testtesttest', 'password')
            ->check('remember')
            ->press('Login')
            ->seePageIs('/login')
            ->see('These credentials do not match our records.')
                ;
    }
    
    public function testCorrectLogin()

    {
         $this->visit('/register')
            ->see('Register')
            ->type('1', 'name')
            ->type('1', 'university')
            ->type('test@test.test', 'email')
            ->type('testtesttest', 'password')
            ->type('testtesttest', 'password_confirmation')
            
            ->press('Register')
            ->seePageIs('/home')
            ->see('Get Started')
                ;
        Auth::logout();
        
        $this->visit('/login')
            ->see('Login')
            ->type('test@test.test', 'email')
            ->type('testtesttest', 'password')
            ->check('remember')
            ->press('Login')
            
            ->seePageIs('/home')
            ->see('Get Started')
            ;
    }
    
    public function testEditProfile(){
         $this->visit('/register')//create an account
            ->see('Register')
            ->type('1', 'name')
            ->type('1', 'university')
            ->type('test@test.test', 'email')
            ->type('testtesttest', 'password')
            ->type('testtesttest', 'password_confirmation')
            
            ->press('Register')
            ->seePageIs('/home')
            ->see('Get Started')
            ;
         $this->visit('/profile/0')//visit profile
             ->see('Profile information')
             ->press('Edit Profile')
             
             ->seePageIs('/edit_profile')//change all possible parameters
             ->type('Jackie Chan','name')
             ->type('University of Chicago','university')
             ->type('test1@test.test','email')
             ->press('Save Changes')
             
             ->seePageIs('/profile/0')//check profile to verify updated info
             ->see('Profile information')
        //     ->see('Success! Profile information was updated.')
             ->see('Jackie Chan')
             ->see('University of Chicago')
             ->see('test1@test.test')
             ;
    }

}
