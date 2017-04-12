<?php

use App\Quiz;
use App\Questions;

use Illuminate\Database\Seeder;
class fill_courses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quizzes')->delete();
        
        $quiz = new Quiz;
        $quiz->university = 'Concordia University';
        $quiz->coursename = 'SOEN 341';
        $quiz->quizname = 'Quiz #1';
        $quiz->username = 'Dr. Computer Guy';
        $quiz->quizdescription = 'This quiz helps you undestand the basics of software processes, it has a few exercices regarding git, some programming and other required topics regarding this course.';
        $quiz->resources = 'https://www.w3schools.com/';
        $quiz->save();
        
        // lets do 3 questions
        for($i = 0; $i < 3; $i++){ 
            $question = new Questions;
            $question->question= "How many bytes in a kilobyte?";
            $question->answer1 = "1024";
            $question->answer2 = "1000";
            $question->answer3 = "500";
            $question->answer4 = "512";
            $question->save();
            
            $quiz->Questions()->save($question);
        }
    }
}