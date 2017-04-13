<?php

namespace Tests\Unit;

use Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class AccountTest extends TestCase
{
    use DatabaseTransactions;

    
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
}
