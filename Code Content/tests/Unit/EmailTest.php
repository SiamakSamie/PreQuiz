<?php

namespace Tests\Unit;

use Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class EmailTest extends TestCase
{
    use DatabaseTransactions;

        public function testFailForgotPassword(){
        $this->visit('/password/reset')
             ->see('Reset Password')
             ->type('1@123.456','email')
             ->press('Reset Password')
             ->see('The email must be a valid email address.')
             ;
    }
    
    public function testForgotPassword(){
         $this->visit('/register')//register for an account
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
         $this->visit('/password/reset')//send credential to reset
             ->see('Reset Password')
             ->type('test@test.test','email')
             ->press('Reset Password')
             ->see('We have e-mailed your password reset link!')
             ;
    }
    
    public function testContactUs(){//submit a form and get the success message
         $this->visit('/contact_us')
             ->see('Fill out this form and')
             ->type('Jackie Chan','name')
             ->type('test@test.test','email')
             ->type('can i join your awesome squad?','message')
             ->press('submit_button')
             ->see('Message sent!')
             ;
    }
}