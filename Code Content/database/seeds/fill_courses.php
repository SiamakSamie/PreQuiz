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
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Concordia University',
            'course_name' => 'SOEN 341',
            'quiz_name' => 'Quiz #2',
            'quiz_creator' => 'Dr. Software guy',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Concordia University',
            'course_name' => 'COMP 346',
            'quiz_name' => 'Quiz #1',
            'quiz_creator' => 'Dr. guy',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Concordia University',
            'course_name' => 'SOEN 331',
            'quiz_name' => 'Quiz 331',
            'quiz_creator' => 'Dr. Computer',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Concordia University',
            'course_name' => 'SOEN 410',
            'quiz_name' => 'Quiz #1',
            'quiz_creator' => 'Dr. Software Engineering',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Concordia University',
            'course_name' => 'SOEN 287',
            'quiz_name' => 'Quiz review',
            'quiz_creator' => 'Dr. Computer guy',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Mcgill University',
            'course_name' => 'SOEN 287',
            'quiz_name' => 'Quiz review',
            'quiz_creator' => 'Dr. Computer guy',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Mcgill University',
            'course_name' => 'COMP 123',
            'quiz_name' => 'Quiz review',
            'quiz_creator' => 'Dr. Computer guy',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Mcgill University',
            'course_name' => 'SOEN 246',
            'quiz_name' => 'Quiz Mcgill',
            'quiz_creator' => 'Dr. Computer guy',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Mcgill University',
            'course_name' => 'COMP 165',
            'quiz_name' => 'Quiz #1',
            'quiz_creator' => 'Dr. guy',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Mcgill University',
            'course_name' => 'SOEN 311',
            'quiz_name' => 'Quiz review',
            'quiz_creator' => 'Dr. Smartypants',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Concordia University',
            'course_name' => 'SOEN 354',
            'quiz_name' => 'Quiz review',
            'quiz_creator' => 'Dr. Mcgill guy',
        ]);
        
        DB::table('courses')->insert([
            'university_name' => 'Concordia University',
            'course_name' => 'SOEN 246',
            'quiz_name' => 'Quiz review #2',
            'quiz_creator' => 'Dr. guy',
        ]);
        
    }
}
