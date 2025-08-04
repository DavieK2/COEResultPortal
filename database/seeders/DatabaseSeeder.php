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
        // User=>=>factory(10)->create();

        User::factory()->create([
            'name' => 'Test Lecturer',
            'email' => 'lecturer@coe.com',
            'password' => bcrypt('password'),
        ]);


        User::factory()->create([
            'name' => 'HOD',
            'email' => 'hod@coe.com',
            'password' => bcrypt('password'),
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

            "Faculty of Vocational and Entrepreneurial Education" => [
                "Department of Agricultural Science Education",
                "Department of Business Education",
                "Department of Continuing Education and Development Studies",
                "Department of Educational Technology",
                "Department of Home Economics Education"
            ],
            
            "Faculty of Arts and Social Science Education" => [
                "Department of Language Arts Education",
                "Department of History and Christian Religious Studies Education",
                "Department of Social Studies and Civic Education",
                "Department of Education Geography and Sustainable Development",
                "Department of Economics and Political Science Education"
            ],
            "Faculty of Educational and Foundation Studies" => [
                "Department of Educational Psychology",
                "Department of Educational Management",
                "Department of Guidance and Counselling",
                "Department of Curriculum and Teaching",
                "Department of Special Needs Education"
            ],
            "Faculty of Science Education" => [
                "Department of Biology Education",
                "Department of Environmental Education",
                "Department of Health Education and Promotion",
                "Department of Human Kinetics and Sports Science",
                "Department of Mathematics and Computer Science Education",
                "Department of Physical Science Education"
            ]

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
 

        $courses = [
            //Department of Continuing Education and Development Studies
    // 100 LEVEL
            [
                "course_name" => "Group work in social work education",
                "course_code" => "EDA 184",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to cooperative Education",
                "course_code" => "EDA 142",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Traders cooperative",
                "course_code" => "EDA 144",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Traditional farming and environmen",
                "course_code" => "EDA 196",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to cooperative Education",
                "course_code" => "EDA 142",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Traders cooperative",
                "course_code" => "EDA 144",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "History of vocational Education",
                "course_code" => "EDA 116",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Literacy,vocational development and situational analysis",
                "course_code" => "EDA 114",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Group work in social work education",
                "course_code" => "EDA 184",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Adoption Strategies in Rural Communities",
                "course_code" => "EDA 126",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Cases in social work Education",
                "course_code" => "EDA 182",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Career women Education",
                "course_code" => "EDA 162",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Living resources conservation",
                "course_code" => "EDA 194",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Career women Education",
                "course_code" => "EDA 162",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Cases in social work Education",
                "course_code" => "EDA 182",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Practice in extension Education",
                "course_code" => "EDA 132",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Public relations principles",
                "course_code" => "EDA 1106",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
            ],
            // 200 LEVEL
            [
                "course_name" => "Ecosystem and community Development",
                "course_code" => "EDA 221",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Ecosystem and community Development",
                "course_code" => "EDA 221",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 2
            ],
            // 300 LEVEL
            [
                "course_name" => "Methods materials in Environmental Adult Education",
                "course_code" => "EDA 392",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Population Education",
                "course_code" => "EDA 324",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Trends and Issues Cooperative Operations in a Changing",
                "course_code" => "EDA 346",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Community Education",
                "course_code" => "EDA 322",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Communication Mass Media and Distance Education",
                "course_code" => "EDA 306",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Outstanding women",
                "course_code" => "EDA 364",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Social Case Work and Community Service",
                "course_code" => "EDA 382",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Outstanding women",
                "course_code" => "EDA 364",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 3
            ],
            // 400 LEVEL
            [
                "course_name" => "Evaluation of Community Projects",
                "course_code" => "EDA 421",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Integrated Community Development",
                "course_code" => "EDA 423",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Programme Design, Planning and Evaluation in Adult Education",
                "course_code" => "EDA 403",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Personnel Management",
                "course_code" => "EDA 472",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Evaluation of Community Projects",
                "course_code" => "EDA 421",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Integrated Community Development",
                "course_code" => "EDA 423",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Programme Design, Planning and Evaluation in Adult Education",
                "course_code" => "EDA 403",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Personnel Management",
                "course_code" => "EDA 472",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Manpower Planning and Education Planning System",
                "course_code" => "EDA 473",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Industrial Communication",
                "course_code" => "EDA 471",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Sociology of development",
                "course_code" => "EDA 422",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Administration of Adult Education",
                "course_code" => "EDA 405",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Principles and Method of Functional Literacy",
                "course_code" => "EDA 402",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Industrial Communication",
                "course_code" => "EDA 471",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Manpower Planning and Education Planning System",
                "course_code" => "EDA 473",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Industrial Communication",
                "course_code" => "EDA 471",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Manpower Planning and Education Planning System",
                "course_code" => "EDA 473",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Cooperative Education in Nigeria",
                "course_code" => "EDA 444",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Due Processing in Cooperative",
                "course_code" => "EDA 446",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Modern Cooperative Management Techniques",
                "course_code" => "EDA 445",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Environmental Impact Assessment on Adult Learning",
                "course_code" => "EDA 491",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Contemporary Issues and Concerns in Environmental Adult Education",
                "course_code" => "EDA 492",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Cooperative Education in Nigeria",
                "course_code" => "EDA 444",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Due Processing in Cooperative",
                "course_code" => "EDA 446",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Modern Cooperative Management Techniques",
                "course_code" => "EDA 445",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Principles of functional principles & methods of teaching Adult",
                "course_code" => "EDA 402",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Community Organisation and Social Work Project",
                "course_code" => "EDA 486",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Mobilization and Village Adoption Scheme",
                "course_code" => "EDA 442",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Manpower Planning and Education Planning System",
                "course_code" => "EDA 473",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Personnel Management",
                "course_code" => "EDA 472",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Manpower Planning and Education Planning System",
                "course_code" => "EDA 473",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Personnel Management",
                "course_code" => "EDA 472",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Trafficking in Human Beings and Social Work Education",
                "course_code" => "EDA 482",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Mobilization and Village Adoption Scheme",
                "course_code" => "EDA 442",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Sociology of Development",
                "course_code" => "EDA 402",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Community Organisation and Social Work Project",
                "course_code" => "EDA 486",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Mobilization and Village Adoption Scheme",
                "course_code" => "EDA 442",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Mobilisation and Village Adoption Scheme",
                "course_code" => "EDA 442",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Fund Raising, Loan Application and Administration",
                "course_code" => "EDA 441",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Evaluation of Community Projects",
                "course_code" => "EDA 421",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Integrated Community Development",
                "course_code" => "EDA 423",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Community Organisation and Social Work Project",
                "course_code" => "EDA 486",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Mobilization and Village Adoption Scheme",
                "course_code" => "EDA 442",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Community Organisation and Social Work Project",
                "course_code" => "EDA 486",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Mobilization and Village Adoption Scheme",
                "course_code" => "EDA 442",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Community Organisation and Social Work Project",
                "course_code" => "EDA 486",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Mobilization and Village Adoption Scheme",
                "course_code" => "EDA 442",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Programme Design, Planning and Evaluation in Adult Education",
                "course_code" => "EDA 403",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Personnel Management",
                "course_code" => "EDA 472",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Media Ethics",
                "course_code" => "EDA 406",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Principles and methods of functional Literacy",
                "course_code" => "EDA 402",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Personnel management",
                "course_code" => "EDA 472",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "United nations organization education policies",
                "course_code" => "EDA 416",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Community Organisation and Social Work Project",
                "course_code" => "EDA 486",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Mobilization and Village Adoption Scheme",
                "course_code" => "EDA 442",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Community Organisation and Social Work Project",
                "course_code" => "EDA 486",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Mobilization and Village Adoption Scheme",
                "course_code" => "EDA 442",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Women and the Living Environment",
                "course_code" => "EDA 491",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Principles and practices of environmental Adult Education",
                "course_code" => "EDA 492",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Community Organisation and Social Work Project",
                "course_code" => "EDA 486",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Mobilization and Village Adoption Scheme",
                "course_code" => "EDA 442",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],

                //Department of Education Management
             [
                "course_name" => "Communication in English",
                "course_code" => "GST111",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to teaching and foundations of education",
                "course_code" => "EDU101",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "History of Educational Management In Nigeria",
                "course_code" => "EDM101",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to Administrative and Management Theories",
                "course_code" => "EDM103",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to Educational Policies in Nigeria",
                "course_code" => "EDM133",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Student personnel services and management",
                "course_code" => "EDM123",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Nigerian people and culture",
                "course_code" => "GST112",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Philosophy of Education",
                "course_code" => "EDU142",
                "faculty_id"=> 3,
                "department_id"=> 12,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to Management and Human Resources Behaviours in Organization",
                "course_code" => "EDM102",
                "faculty_id"=> 3,
                "department_id"=> 12,
                "semester_id" => 2,
                "level_id"=> 1
            ],
            [
                "course_name" => "Introduction to personnel relationship",
                "course_code" => "EDM136",
                "faculty_id"=> 3,
                "department_id"=> 12,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Educational agencies in Nigeria",
                "course_code" => "EDM138",
                "faculty_id"=> 3,
                "department_id"=> 12,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Staff personnel management",
                "course_code" => "EDM124",
                "faculty_id"=> 3,
                "department_id" => 12,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Nigerian Peoples and Culture",
                "course_code" => "GST211",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Safety, health, and school environment",
                "course_code" => "EDU202",
                "faculty_id"=> 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Curriculum, curriculum delivery, and general teaching methods",
                "course_code" => "EDU201",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "ICT in Education",
                "course_code" => "EDU203",
                "faculty_id"=> 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Introduction to Human Resource Management and Communication Skills in Education",
                "course_code" => "EDM201",
                "faculty_id"=> 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Contextual Management of Primary, Secondary, and Tertiary Institutions",
                "course_code" => "EDM203",
                "faculty_id"=> 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Leadership and Interpersonal Relationships in Organizations",
                "course_code" => "EDM205",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Philosophy, Logic and Human Existence",
                "course_code" => "GST212",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Adult Basic Education",
                "course_code" => "EDA202",
                "faculty_id" => 3,
                "department_id"=> 12,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Administration of School Laws in Nigeria",
                "course_code" => "EDM232",
                "faculty_id"=> 3,
                "department_id" => 12,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "School Plant Administration",
                "course_code" => "EDM 234",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Change and Innovation Process in Formal Organization",
                "course_code" => "EDM 236",
                "faculty_id"=> 3,
                "department_id" => 12,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Foundation of Educational Planning",
                "course_code" => "EDM238",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Entrepreneurship",
                "course_code" => "GST311",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Fundamentals of Educational Administration",
                "course_code" => "EDU 311",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Problems and Issues in Planning Nigerian Education",
                "course_code" => "EDM 311",
                "faculty_id"=> 3,
                "department_id"=> 12,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "School Supervision in Nigeria",
                "course_code" => "EDM337",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Introduction to Administrative Theories",
                "course_code" => "EDM399",
                "faculty_id"=> 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Introduction to Administration of Higher Education",
                "course_code" => "EDM313",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Educational Systems Analysis",
                "course_code" => "EDM 335",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Peace and conflict resolutions",
                "course_code" => "GST312",
                "faculty_id"=> 3,
                "department_id" => 12,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Educational measurements, tests, research methods and statistics",
                "course_code" => "EDU302",
                "faculty_id"=> 3,
                "department_id"=> 12,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Economics of Education",
                "course_code" => "EDM 332",
                "faculty_id"=> 3,
                "department_id" => 12,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Statistical Methods in Educational Management",
                "course_code" => "EDM 336",
                "faculty_id"=> 3,
                "department_id"=> 12,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Organization and Administration of UBE and Senior Secondary Schools in Nigeria",
                "course_code" => "EDM 334",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "School Community Relationship",
                "course_code" => "EDM388",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Teaching Practice",
                "course_code" => "EDU 401",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Practicum",
                "course_code" => "EDM431",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Comparative Education",
                "course_code" => "EDM411",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Policy Analysis in Educational Management",
                "course_code" => "EDM 432",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Emergent Issues in Nigerian Education",
                "course_code" => "EDM437",
                "faculty_id"=> 3,
                "department_id" => 12,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Seminar in Educational Administration",
                "course_code" => "EDM 402",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "School Business Management and Record Keeping",
                "course_code" => "EDM409",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Comparative Education",
                "course_code" => "EDM411",
                "faculty_id" => 3,
                "department_id" => 12,
                "semester_id" => 2,
                "level_id" => 4
            ],

            //Department of Human Kinetics and Sport Science
            
            [
                "course_name" => "Communication in English",
                "course_code" => "GST 111",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to teaching Foundations of Education",
                "course_code" => "EDU 101",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Foundations of Physical, Exercise and Sports Development",
                "course_code" => "HKE 101",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Fundamental of Human Anatomy and Physiology",
                "course_code" => "HKE 103",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to Psychology and Sociology of Sport and Exercise",
                "course_code" => "HKE 105",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to Facilities and Equipment in Sports and Games",
                "course_code" => "HKE 107",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Organization and Administration of Intra-mural and Extra-mural Sports in Schools",
                "course_code" => "HKE 109",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Human Growth and Development",
                "course_code" => "HKE 111",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to Human Communication",
                "course_code" => "CMS 101",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Foundations To Broadcasting",
                "course_code" => "MCM 141",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Nigerian people and culture",
                "course_code" => "GST 112",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to Teaching and Education",
                "course_code" => "EDU 102",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Skill Development and Techniques of ( track & field event)",
                "course_code" => "HKE 102",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Skill Development and Techniques in gymnastics",
                "course_code" => "HKE 104",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Inclusive Physical Education and Sport",
                "course_code" => "HKE 106",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Human Kinetics Education in Primary School",
                "course_code" => "HKE 108",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Combat Sports",
                "course_code" => "HKE 112",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Officiating in Sports and Games I",
                "course_code" => "HKE 114",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Writing for the Media",
                "course_code" => "CMS 102",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Principles of Public Relation",
                "course_code" => "MCM 102",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to News Writing",
                "course_code" => "MCM 104",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Entrepreneurship and Innovation",
                "course_code" => "ENT 211",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Curriculum and Techniques in Swimming",
                "course_code" => "EDU 201",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Skills Development and Techniques in Swimming",
                "course_code" => "HKE 201",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Organization and Administration of Facility",
                "course_code" => "HKE 203",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Application of Computer Skills in Sports And Games",
                "course_code" => "HKE 205",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Physical Fitness Facilities and Equipment Management",
                "course_code" => "HKE 209",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Groundsmanship in Sports",
                "course_code" => "HKE 213",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Critical& Review Writing",
                "course_code" => "MCM 201",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Writing for Public Relations",
                "course_code" => "MCM 213",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Radio/ TV News Reporting and Production",
                "course_code" => "MCM 207",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Philosophy, Logic and Human Existence",
                "course_code" => "GST 212",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Introduction to Biomechanics and kinesiology",
                "course_code" => "HKE 202",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "First Aids and Accident Prevention in sport",
                "course_code" => "HKE 204",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Water Safety and Hygiene Education",
                "course_code" => "HKE 206",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Practicum in Sports and Games",
                "course_code" => "HKE 208",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Motor Learning and Human Performance",
                "course_code" => "HKE 212",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Canoeing and watercrafts skills development",
                "course_code" => "HKE 214",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Advanced and Specialized Reporting",
                "course_code" => "MCM 204",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Marketing Foundations for Public Relations and Advertising",
                "course_code" => "MCM 212",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Fundamentals of media Relation",
                "course_code" => "HKE 214",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Test And Measurement",
                "course_code" => "EDU 343",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Educational Technology",
                "course_code" => "EDU 321",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Fundamental of Education Administration",
                "course_code" => "EDU 311",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Environmental Stress, Conditioning and Acclimatization",
                "course_code" => "EDK 351",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Curriculum Studies in Human Kinetics and Health Education",
                "course_code" => "EDK 321",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Nutrition and Sports Performance",
                "course_code" => "EDK 301",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Swimming and Aquatic Sports1",
                "course_code" => "EDK 311",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Skills And Techniques in Team And Individual Sports",
                "course_code" => "EDK 331",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Introduction to Sports Psychology",
                "course_code" => "EDP 321",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Exercise Physiology",
                "course_code" => "EDP 341",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Principles and Practice of Public And Community Health",
                "course_code" => "EDH 301",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Social And Emotional Health",
                "course_code" => "EDH 311",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Entrepreneurship Development (Practical)",
                "course_code" => "GST 302",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Special Education Needs",
                "course_code" => "EDU 372",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Science Technology & Society",
                "course_code" => "SED 342",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Skills Development and Techniques in Sport and Games",
                "course_code" => "EDK 332",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Special Methods And Material in Human Kinetics and Health Education",
                "course_code" => "EDK 302",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Problem in Human Kinetics & Health Education",
                "course_code" => "EDK 322",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Introduction to Long Essay in Human Kinetics and Health Education",
                "course_code" => "EDK 342",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Senior Special Leadership Course in Human Kinetics and Health Education",
                "course_code" => "EDK 352",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Organization and Administration of Physical and Health Education",
                "course_code" => "EDP 302",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Analysis of Physical Fitness",
                "course_code" => "EDP 342",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Consumer Health",
                "course_code" => "EDH 322",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Mental & Emotional Health",
                "course_code" => "EDH 302",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Project Writing",
                "course_code" => "EDU 401",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Teaching Practice",
                "course_code" => "EDU 421",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Teaching practice Evaluation",
                "course_code" => "EDU 423",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Seminar in Human Kinetics and Health Education",
                "course_code" => "EDK 401",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Guidance and Counselling",
                "course_code" => "EDU 442",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Advance Training in Skills, Coaching and Officiating",
                "course_code" => "EDK 432",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Human Kinetics & Recreation for the Physically Handicapped",
                "course_code" => "EDK 492",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Drug Education II",
                "course_code" => "EDH 422",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Bugeting and Finance in Human Kinetics and Health Education",
                "course_code" => "EDK 422",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Safety Education",
                "course_code" => "EDK 412",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Psychology of Coaching",
                "course_code" => "EDP 482",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Sociology of Sports",
                "course_code" => "EDP 432",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Contemporary and African Dance Notation",
                "course_code" => "EDP 412",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Issues in Health",
                "course_code" => "EDH 432",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Development of Healthy Attitude & Current Trends in Health Education",
                "course_code" => "EDH 402",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Adolescent & Adult Health",
                "course_code" => "EDH 412",
                "faculty_id" => 4,
                "department_id" => 19,
                "semester_id" => 2,
                "level_id" => 4
            ],


            //Department of Home Economics Education

            [
                "course_name" => "Use of English",
                "course_code" => "GST 111",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to Teaching and Foundation of Education",
                "course_code" => "EDU 101",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to Vocational & Technical Education",
                "course_code" => "VTE 111",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Meal Management and Service",
                "course_code" => "EHO 111",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to Home Economics",
                "course_code" => "EHO 101",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to Textiles and Clothing",
                "course_code" => "EHO 103",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to Foods",
                "course_code" => "EHO 105",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to clothing Construction",
                "course_code" => "EHO 107",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to Health and Disease in Nutrition",
                "course_code" => "EHO 113",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to Basic Design and Allied craft",
                "course_code" => "EHO 141",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Orientation to Food Lab. Equipment and Tools",
                "course_code" => "EHO 135",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to Biology",
                "course_code" => "BIO 111",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Mathematics",
                "course_code" => "Maths 111",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Enterprise, Venture development, Financing & Sustainability",
                "course_code" => "FVE 111",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Teaching of Organic Farming Education",
                "course_code" => "FVE 113",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Nigerian people and culture",
                "course_code" => "GST 112",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to Chemistry",
                "course_code" => "CHM 102",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to Physics",
                "course_code" => "PHY 102",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Principles of Home Management",
                "course_code" => "EHO 102",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to Human Development",
                "course_code" => "EHO 104",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Fundamentals of food Preparation",
                "course_code" => "EHO 106",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Community Nutrition",
                "course_code" => "EHO 112",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to Computer Aided Pattern Drafting and Designing",
                "course_code" => "EHO 114",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Intro to contemporary Voc. Skills Dev.",
                "course_code" => "FVE 112",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Fundamental of Laboratory & Workshops",
                "course_code" => "FVE 114",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Entrepreneurship and Innovation",
                "course_code" => "ENT 211",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Curriculum, Curriculum Delivery and General Teaching Methods",
                "course_code" => "EDU 201",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Principles of Nutrition",
                "course_code" => "EHO 211",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Housing Design and Management",
                "course_code" => "EHO 213",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Home Administration",
                "course_code" => "EHO 215",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Clothing Selection and Maintenance",
                "course_code" => "EHO 217",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Work Simplification and Household Equipment",
                "course_code" => "EHO 231",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Marriage and Family Relationship",
                "course_code" => "EHO 221",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Clothing Techniques",
                "course_code" => "EHO 219",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Sustainable Home-base Entrepreneurship I",
                "course_code" => "FVE 213",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Techniques of Broiler Production Education",
                "course_code" => "FVE 215",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Philosophy, Logic and Human Existence",
                "course_code" => "GST 212",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Special Methods in Teaching Home Economics",
                "course_code" => "EHO 212",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Pattern Drafting and Clothing Construction",
                "course_code" => "EHO 214",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Community Health",
                "course_code" => "EHO 216",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Food Preparation and Management",
                "course_code" => "EHO 218",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Household Craft 1",
                "course_code" => "EHO 222",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Beverages and drinks, condiments and flavoring",
                "course_code" => "EHO 232",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Hospitality Management",
                "course_code" => "EHO 262",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Literacy Farm",
                "course_code" => "FVE",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Sustainable Home-Base Entrepreneurship",
                "course_code" => "FVE",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Entrepreneurship Development I",
                "course_code" => "GSS 301",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Fundamentals of Educational Administration",
                "course_code" => "EDU 311",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Educational Technology",
                "course_code" => "EDU 321",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Basic Statistics for Education",
                "course_code" => "EDU 341",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Food Preservation Methods",
                "course_code" => "EHO 311",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Pregnancy and Early Child Care Development",
                "course_code" => "EHO 321",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Nutrition in Health and Disease",
                "course_code" => "EHO 341",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Advanced Textile Design",
                "course_code" => "EHO 351",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Principles of Fashion Designing",
                "course_code" => "EHO 361",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Fundamental Principles of Nutrition",
                "course_code" => "EHO 371",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Nursery Management",
                "course_code" => "EHO 381",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Digital Entrepreneurship",
                "course_code" => "FVE 311",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Entrepreneurship Development II",
                "course_code" => "GSS 302",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Research Methods in Education",
                "course_code" => "EDU 302",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Special Education Needs",
                "course_code" => "EDU 372",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Students industrial work",
                "course_code" => "VTE 312",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Test and Measurement",
                "course_code" => "EDU 372",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Child care & Development Practicum",
                "course_code" => "EHO 312",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Community & Applied Nutrition",
                "course_code" => "EHO 322",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Event Management",
                "course_code" => "EHO 342",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Marriage & Family Relationship",
                "course_code" => "EHO 372",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Consumer Education",
                "course_code" => "EHO 382",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Clothing care and Laundry Work",
                "course_code" => "EHO 392",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Digital Media Practical (G V V R)",
                "course_code" => "FVE 312",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Research Project",
                "course_code" => "EDU 401",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Teaching Practice",
                "course_code" => "EDU 421",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Post Teaching Practice",
                "course_code" => "EDU 431",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 1,
                "level_id" => 4
            ],
            [
                "course_name" => "Seminar in Home Economics",
                "course_code" => "EDU 402",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Food Service System and Administration",
                "course_code" => "EHO 432",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Exhibition/Practical Examination",
                "course_code" => "EHO 452",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Home Management Practicum",
                "course_code" => "EHO 462",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Current Trends in Home Economics",
                "course_code" => "EHO 472",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Vocational Guidance",
                "course_code" => "VTE 412",
                "faculty_id" => 1,
                "department_id" => 5,
                "semester_id" => 2,
                "level_id" => 4
            ],

            // Department of Language Arts Education
            [
                "course_name" => "Instructional strategies in English/ French",
                "course_code" => "AEE/AEF 101",
                "faculty_id" => 2,
                "department_id" => 6,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Introduction to Arts and Humanities Education",
                "course_code" => "GAE 101",
                "faculty_id" => 2,
                "department_id" => 6,
                "semester_id" => 1,
                "level_id" => 1
            ],
            [
                "course_name" => "Information Literacy for English Language/Literature in English",
                "course_code" => "AEE 221",
                "faculty_id" => 2,
                "department_id" => 6,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Information Literacy for French/Literature in French",
                "course_code" => "AEF 221",
                "faculty_id" => 2,
                "department_id" => 6,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Method I: Teaching grammar, lexis and oracy skills",
                "course_code" => "LAS 244",
                "faculty_id" => 2,
                "department_id" => 6,
                "semester_id" => 1,
                "level_id" => 2
            ],
            [
                "course_name" => "Issues in Arts Education",
                "course_code" => "AEE 311",
                "faculty_id" => 2,
                "department_id" => 6,
                "semester_id" => 1,
                "level_id" => 3
            ],
            [
                "course_name" => "Communication Skills for French Teachers",
                "course_code" => "AEF 102",
                "faculty_id" => 2,
                "department_id" => 6,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Communication Skills for English Teachers",
                "course_code" => "AEE 102",
                "faculty_id" => 2,
                "department_id" => 6,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Instructional Materials for French/Literature-in French/Literature",
                "course_code" => "AEF 202",
                "faculty_id" => 2,
                "department_id" => 6,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Oral French Pedagogy",
                "course_code" => "AEF 222",
                "faculty_id" => 2,
                "department_id" => 6,
                "semester_id" => 2,
                "level_id" => 2
            ],
            [
                "course_name" => "Research in Arts Education",
                "course_code" => "AED 312",
                "faculty_id" => 2,
                "department_id" => 6,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Theories & Practice of Teaching and Learning in Arts Education",
                "course_code" => "AED 322",
                "faculty_id" => 2,
                "department_id" => 6,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Methods of Teaching English/Literature",
                "course_code" => "AED 332",
                "faculty_id" => 2,
                "department_id" => 6,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Arts Education Policies in Nigeria",
                "course_code" => "AED 402",
                "faculty_id" => 2,
                "department_id" => 6,
                "semester_id" => 2,
                "level_id" => 4
            ]
        ];


        collect( $courses )->each( fn($course) => Course::create( $course ) );


    }
}
