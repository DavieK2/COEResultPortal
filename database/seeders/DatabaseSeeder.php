<?php

namespace Database\Seeders;

use App\Models\AcademicSession;
use App\Models\AssessmentCategory;
use App\Models\Course;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Level;
use App\Models\Semester;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test Lecturer',
            'email' => 'lecturer@coe.com',
            'password' => bcrypt('password'),
        ]);

        Course::create([
            'course_name' => 'Test Course',
            'course_code' => 'TC101',
        ]);

        AcademicSession::create([
            'session' => '2024/2025'
        ]);

        Semester::create([
            'semester' => 'First Semester'
        ]);

        collect(['CA 1', 'CA 2', 'Exam'])->each(function($assessment){
            AssessmentCategory::create([
                'category' => $assessment
            ]);
        });

        Semester::create([
            'semester' => 'Second Semester'
        ]);
    
        collect([100, 200, 300, 400, 500])->each(function($level){
            Level::create([
                'level' => $level
            ]);
        });
    
    
        collect([
            'Faculty of Vocational and Entrepreneurial Education' => [
                'Science Education',
                'Human Kinetics and Health Education',
                'Vocational Education'
            ], 
            'Faculty of Science Education' => [
                'Science Education',
                'Human Kinetics and Health Education',
                'Vocational Education'
            ], 
            'Faculty of Arts and Social Sciences Education' => [
                'Arts Education',
                'Social Science Education',
                'Continuing Education and Development Studies (Adult Education)',
                'Library and Information Science',
                'Environmental Education',
            ], 
            'Faculty of Educational Foundational Studies' => [
                'Educational Foundations',
                'Educational Management',
                'Guidance and Counseling',
                'Curriculum and Teaching',
                'Special Education',
            ],
    
        ])->each(function($departments, $faculty){
    
            $f = Faculty::create([
                'faculty_name' => $faculty
            ]);
    
            
            collect($departments)->each(function($department) use ($f){
                Department::create([
                    'department_name' => $department,
                    'faculty_id' => $f->id
                ]);
            });
        });    


    }
}
