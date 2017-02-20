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
        DB::table('courses')->delete();
        
        DB::table('courses')->insert([
            'university_name' => 'Concordia University',
            'course_name' => 'SOEN 341',
            'quiz_name' => 'Quiz #1',
            'quiz_creator' => 'Dr. Computer guy',
            'quiz_description' => 'This quiz helps you undestand the basics of software processes, it has a few exercices regarding git, some programming and other required topics regarding this course.',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Concordia University',
            'course_name' => 'SOEN 341',
            'quiz_name' => 'Quiz #2',
            'quiz_creator' => 'Dr. Software guy',
            'quiz_description' => 'This review quiz is created to test students on wether or not they know the difference between software enginerring and computer sicnece.',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Concordia University',
            'course_name' => 'COMP 346',
            'quiz_name' => 'Quiz #1',
            'quiz_creator' => 'Dr. guy',
            'quiz_description' => 'The following quiz helps students understand Uniquore programming in order to prepare them for multicore programming, a topic that is focused on in COMP 346.',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Concordia University',
            'course_name' => 'SOEN 331',
            'quiz_name' => 'Quiz 331',
            'quiz_creator' => 'Dr. Computer',
            'quiz_description' => 'This quiz helps you undestand the basics of the class, and master the prerequisits in order to reduce the difficulties faced through this class',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Concordia University',
            'course_name' => 'SOEN 410',
            'quiz_name' => 'Quiz #1',
            'quiz_creator' => 'Dr. Software Engineering',
            'quiz_description' => 'This quiz helps you undestand the basics of the class, and master the prerequisits in order to reduce the difficulties faced through this class',
            
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Concordia University',
            'course_name' => 'SOEN 287',
            'quiz_name' => 'Quiz review',
            'quiz_creator' => 'Dr. Computer guy',
            'quiz_description' => 'This quiz helps you undestand the basics of the class, and master the prerequisits in order to reduce the difficulties faced through this class',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Mcgill University',
            'course_name' => 'SOEN 287',
            'quiz_name' => 'Quiz review',
            'quiz_creator' => 'Dr. Computer guy',
            'quiz_description' => 'This quiz helps you undestand the basics of software processes, it has a few exercices regarding git, some programming and other required topics regarding this course.',
            
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Mcgill University',
            'course_name' => 'COMP 123',
            'quiz_name' => 'Quiz review',
            'quiz_creator' => 'Dr. Computer guy',
            'quiz_description' => 'This quiz helps you undestand the basics of the class, and master the prerequisits in order to reduce the difficulties faced through this class',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Mcgill University',
            'course_name' => 'SOEN 246',
            'quiz_name' => 'Quiz Mcgill',
            'quiz_creator' => 'Dr. Computer guy',
            'quiz_description' => 'This quiz helps you undestand the basics of the class, and master the prerequisits in order to reduce the difficulties faced through this class',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Mcgill University',
            'course_name' => 'COMP 165',
            'quiz_name' => 'Quiz #1',
            'quiz_creator' => 'Dr. guy',
            'quiz_description' => 'This quiz helps you undestand the basics of the class, and master the prerequisits in order to reduce the difficulties faced through this class',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Mcgill University',
            'course_name' => 'SOEN 311',
            'quiz_name' => 'Quiz review',
            'quiz_creator' => 'Dr. Smartypants',
            'quiz_description' => 'This quiz helps you undestand the basics of the class, and master the prerequisits in order to reduce the difficulties faced through this class',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Concordia University',
            'course_name' => 'SOEN 354',
            'quiz_name' => 'Quiz review',
            'quiz_creator' => 'Dr. Mcgill guy',
            'quiz_description' => 'This quiz helps you undestand the basics of the class, and master the prerequisits in order to reduce the difficulties faced through this class',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Concordia University',
            'course_name' => 'SOEN 246',
            'quiz_name' => 'Quiz review #2',
            'quiz_creator' => 'Dr. guy',
            'quiz_description' => 'This quiz helps you undestand the basics of the class, and master the prerequisits in order to reduce the difficulties faced through this class',
        ]);
        
    }
}
