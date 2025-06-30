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
                "course_name" => "group work in social work education",
                "course_code" => "EDA 184",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
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
                "course_name" => "Methods materials in Environmental Adult Education",
                "course_code" => "EDA 392",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 3
            ],
            [
                "course_name" => "Traditional farming and environment",
                "course_code" => "EDA 196",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
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
                "course_name" => "Trafficking in Human Beings and Social Work Education",
                "course_code" => "EDA 482",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
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
                "course_name" => "Sociology of Development",
                "course_code" => "EDA 402",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
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
                "course_name" => "Adoption Strategies in Rural Communities",
                "course_code" => "EDA 126",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
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
                "course_name" => "Cases in social work Education",
                "course_code" => "EDA 182",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 1
            ],
            [
                "course_name" => "Ecosystem and community Development",
                "course_code" => "EDA 221",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 1,
                "level_id" => 2
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
                "course_name" => "Media Ethics",
                "course_code" => "EDA 406",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
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
                "course_name" => "Personnel management",
                "course_code" => "EDA 472",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
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
                "course_name" => "United nations organization education policies",
                "course_code" => "EDA 416",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 4
            ],
            [
                "course_name" => "Public relations principles",
                "course_code" => "EDA 1106",
                "faculty_id" => 1,
                "department_id" => 3,
                "semester_id" => 2,
                "level_id" => 11
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
            ]
        ];


        collect( $courses )->each( fn($course) => Course::create( $course ) );



    }
}
