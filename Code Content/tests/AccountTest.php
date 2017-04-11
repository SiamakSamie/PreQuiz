<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class AccountTest extends TestCase
{
    use DatabaseTransactions;
      public function testRegistration()// make sure this is new everytime, use factory
    {
        //$this->withoutEvents();
        
        $this->visit('/register')
            ->see('Register')
            ->type('1', 'name')
            ->type('1', 'university')
            ->type('3@test.test', 'email')
            ->type('22222222', 'password')
            ->type('22222222', 'password_confirmation')
            
            ->press('Register')
//            ->see('The email has already been taken.')
            ->seePageIs('/home')
//            ->see('Get Started')
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
            ->see('These credentials do not match our records.')
         //   ->seePageIs('/home')
            // ->see('Get Started')
                ;
    }
    
    public function testCorrectLogin()
    {
        $this->visit('/login')
            ->see('Login')
            ->type('1@test.test', 'email')
            ->type('22222222', 'password')
            ->check('remember')
            ->press('Login')
            ->seePageIs('/home')
            // ->see('Get Started')
                ;
    }
}