<?php

namespace Tests\Unit;

use Tests\TestCase;
use \App\User;
use \App\Quiz;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateQuizTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateQuiz()
    {
         $user = factory(User::class)->create();
         $this->be($user);
         
         $this->visit('/create_quiz')
            ->see('Create new quiz');
            
        $this->visit('/create_quiz')
         ->type('Taylor', 'university')
         ->type('Taylor', 'coursename')
         ->type('Taylor', 'quizname')
         ->type('Taylor', 'quizdescription')
         ->press('Create Quiz')
         ->see('Add new questions')
         ->see('Taylor');
    }
    
//     public function testSearch() {
//         $this->post('/search', ['uni_name' => 'Concordia University', 'course_id' => 'SOEN 341']);
//         dd($this);
//     }

}
