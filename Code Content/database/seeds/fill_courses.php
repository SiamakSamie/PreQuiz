<?php
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
        
        DB::table('quizzes')->insert([
            'university' => 'Concordia University',
            'coursename' => 'SOEN 341',
            'quizname' => 'Quiz #1',
            'username' => 'Dr. Computer guy',
            'quizdescription' => 'This quiz helps you undestand the basics of software processes, it has a few exercices regarding git, some programming and other required topics regarding this course.',
            'resources' => 'https://www.w3schools.com/',
        ]);
        
        DB::table('quizzes')->insert([
            'university' => 'Concordia University',
            'coursename' => 'SOEN 341',
            'quizname' => 'Quiz #2',
            'username' => 'Dr. Software guy',
            'quizdescription' => 'This review quiz is created to test students on wether or not they know the difference between software enginerring and computer sicnece.',
            'resources' => 'https://www.w3schools.com/',
        ]);
        
        DB::table('quizzes')->insert([
            'university' => 'Concordia University',
            'coursename' => 'COMP 346',
            'quizname' => 'Quiz #1',
            'username' => 'Dr. guy',
            'quizdescription' => 'The following quiz helps students understand Uniquore programming in order to prepare them for multicore programming, a topic that is focused on in COMP 346.',
            'resources' => 'https://www.w3schools.com/',
        ]);
        
        DB::table('quizzes')->insert([
            'university' => 'Stanford University',
            'coursename' => 'SOEN 331',
            'quizname' => 'Quiz 331',
            'username' => 'Dr. Computer',
            'quizdescription' => 'This quiz helps you undestand the basics of the class, and master the prerequisits in order to reduce the difficulties faced through this class',
            'resources' => 'https://www.w3schools.com/',
        ]);
        
        DB::table('quizzes')->insert([
            'university' => 'University of toronto',
            'coursename' => 'SOEN 410',
            'quizname' => 'Quiz #1',
            'username' => 'Dr. Software Engineering',
            'quizdescription' => 'This quiz helps you undestand the basics of the class, and master the prerequisits in order to reduce the difficulties faced through this class',
            'resources' => 'https://www.w3schools.com/',
            
        ]);
        
        DB::table('quizzes')->insert([
            'university' => 'University of toronto',
            'coursename' => 'SOEN 287',
            'quizname' => 'Quiz review',
            'username' => 'Dr. Computer guy',
            'quizdescription' => 'This quiz helps you undestand the basics of the class, and master the prerequisits in order to reduce the difficulties faced through this class',
            'resources' => 'https://www.w3schools.com/',
        ]);
        
        DB::table('quizzes')->insert([
            'university' => 'Harvard University',
            'coursename' => 'SOEN 287',
            'quizname' => 'Quiz review',
            'username' => 'Dr. Computer guy',
            'quizdescription' => 'This quiz helps you undestand the basics of software processes, it has a few exercices regarding git, some programming and other required topics regarding this course.',
            'resources' => 'https://www.w3schools.com/',
            
        ]);
        
        DB::table('quizzes')->insert([
            'university' => 'Mcgill University',
            'coursename' => 'COMP 123',
            'quizname' => 'Quiz review',
            'username' => 'Dr. Computer guy',
            'quizdescription' => 'This quiz helps you undestand the basics of the class, and master the prerequisits in order to reduce the difficulties faced through this class',
            'resources' => 'https://www.w3schools.com/',
        ]);
        
        DB::table('quizzes')->insert([
            'university' => 'Mcgill University',
            'coursename' => 'SOEN 246',
            'quizname' => 'Quiz Mcgill',
            'username' => 'Dr. Computer guy',
            'quizdescription' => 'This quiz helps you undestand the basics of the class, and master the prerequisits in order to reduce the difficulties faced through this class',
            'resources' => 'https://www.w3schools.com/',
        ]);
        
        DB::table('quizzes')->insert([
            'university' => 'Mcgill University',
            'coursename' => 'COMP 165',
            'quizname' => 'Quiz #1',
            'username' => 'Dr. guy',
            'quizdescription' => 'This quiz helps you undestand the basics of the class, and master the prerequisits in order to reduce the difficulties faced through this class',
            'resources' => 'https://www.w3schools.com/',
        ]);
        
        DB::table('quizzes')->insert([
            'university' => 'Mcgill University',
            'coursename' => 'SOEN 311',
            'quizname' => 'Quiz review',
            'username' => 'Dr. Smartypants',
            'quizdescription' => 'This quiz helps you undestand the basics of the class, and master the prerequisits in order to reduce the difficulties faced through this class',
            'resources' => 'https://www.w3schools.com/',
        ]);
        
        DB::table('quizzes')->insert([
            'university' => 'Michigan University',
            'coursename' => 'SOEN 354',
            'quizname' => 'Quiz review',
            'username' => 'Dr. Mcgill guy',
            'quizdescription' => 'This quiz helps you undestand the basics of the class, and master the prerequisits in order to reduce the difficulties faced through this class',
            'resources' => 'https://www.w3schools.com/',
        ]);
        
        DB::table('quizzes')->insert([
            'university' => 'Concordia University',
            'coursename' => 'SOEN 246',
            'quizname' => 'Quiz review #2',
            'username' => 'Dr. guy',
            'quizdescription' => 'This quiz helps you undestand the basics of the class, and master the prerequisits in order to reduce the difficulties faced through this class',
            'resources' => 'https://www.w3schools.com/',
        ]);
        
    }
}