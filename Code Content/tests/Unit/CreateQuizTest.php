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

    public function testSearchQuiz()
    {
        $user = factory(User::class)->create();
         $this->be($user);
         
         $this->visit('/create_quiz')
            ->see('Create new quiz')
            ->type('Concordia', 'university')
            ->type('COMP 514', 'coursename')
            ->type('Winter 2017 Section SS', 'quizname')
            ->type('A prequiz by Dr. Samie', 'quizdescription')
            ->press('Create Quiz')
            ;
         $this->visit('/')
            ->see('Get Started')
            ->type('Concordia','uni_name')
    //        ->press('search_unis')
            ->type('COMP 514', 'course_id')
            ->press('search')
            ->seePageIs('/search')
            ->see('COMP 514')
            ->see('searching for class')
            ->see('1 entrie(s) found')
            ;
            
    }
    

}
