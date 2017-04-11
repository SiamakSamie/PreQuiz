<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_All_Simple_routes() {
      $this->visit('/')
            ->see('Get Started')
            ->dontSee('Delete user');
            
      
    }
    
    public function test_Search_For_Class() {
      // $this->visit('/')
      //     ->type('Concordia University', 'uni_name')
      //     ->type('SOEN 341', 'course_id')
      //     ->press('search');
    }
}
