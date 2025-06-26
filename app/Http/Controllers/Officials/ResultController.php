<?php

namespace App\Http\Controllers\Officials;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Result;
use App\Models\ResultUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResultController extends Controller
{
    public function __construct()
    {
       if ( auth()->user()->email !== 'hod@coe.com') {
            
            abort(403, 'Unauthorized action.');
        }
    }

    public function index()
    {
        $uploads = ResultUpload::join('faculties', 'result_uploads.faculty_id', 'faculties.id')
                                ->join('academic_sessions', 'result_uploads.academic_session_id', 'academic_sessions.id')
                                ->join('departments', 'result_uploads.department_id', 'departments.id')
                                ->join('semesters', 'result_uploads.semester_id', 'semesters.id')
                                ->join('courses', 'result_uploads.course_id', 'courses.id')
                                ->join('levels', 'result_uploads.level_id', 'levels.id')
                                ->join('assessment_categories', 'result_uploads.assessment_category_id', 'assessment_categories.id')
                                ->join('users', 'result_uploads.submitted_by', 'users.id')
                                ->select(
                                    'result_uploads.id as result_id',
                                    'faculties.faculty_name as faculty_name',
                                    'academic_sessions.session as session',
                                    'departments.department_name as department_name',
                                    'semesters.semester as semester',
                                    'courses.course_name as course_name',
                                    'levels.level as level',
                                    'assessment_categories.category as category',
                                    'users.name as submitted_by',
                                    'result_uploads.created_at as submitted_at',
                                )->get();


        return view('admin.uploads.index', [ 'uploads' => $uploads ]);
    }


    public function show(ResultUpload $id)
    {
        
        $results = Result::where('results.result_upload_id', $id->id)
                        ->select(
                            'results.student_name',
                            'results.mat_no',
                            'results.score'
                        )->get();

        $result_data = ResultUpload::where('result_uploads.id', $id->id)
                                    ->join('faculties', 'result_uploads.faculty_id', 'faculties.id')
                                    ->join('academic_sessions', 'result_uploads.academic_session_id', 'academic_sessions.id')
                                    ->join('departments', 'result_uploads.department_id', 'departments.id')
                                    ->join('semesters', 'result_uploads.semester_id', 'semesters.id')
                                    ->join('courses', 'result_uploads.course_id', 'courses.id')
                                    ->join('levels', 'result_uploads.level_id', 'levels.id')
                                    ->join('assessment_categories', 'result_uploads.assessment_category_id', 'assessment_categories.id')
                                    ->select(
                                        'result_uploads.id as result_id',
                                        'faculties.faculty_name as faculty_name',
                                        'academic_sessions.session as session',
                                        'departments.department_name as department_name',
                                        'semesters.semester as semester',
                                        'courses.course_name as course_name',
                                        'levels.level as level',
                                        'assessment_categories.category as category',
                                    )->first();

        return view('admin.uploads.show', [ 'results' => $results, 'result_data' => $result_data ]);
    }

    public function courseResults()
    {

        return view('admin.results.index');   

    }

    public function getCourseResults()
    {
        $results = ResultUpload::join('faculties', 'result_uploads.faculty_id', 'faculties.id')
                                ->join('academic_sessions', 'result_uploads.academic_session_id', 'academic_sessions.id')
                                ->join('departments', 'result_uploads.department_id', 'departments.id')
                                ->join('semesters', 'result_uploads.semester_id', 'semesters.id')
                                ->join('courses', 'result_uploads.course_id', 'courses.id')
                                ->join('levels', 'result_uploads.level_id', 'levels.id')
                                ->join('assessment_categories', 'result_uploads.assessment_category_id', 'assessment_categories.id')
                                ->join('users', 'result_uploads.submitted_by', 'users.id')
                                ->where('academic_sessions.id', request('session'))
                                ->where('semesters.id', request('semester'))
                                ->where('levels.id', request('level'))
                                ->where('departments.id', request('department'))
                                ->where('faculties.id', request('faculty'))
                                ->where('courses.id', request('course'))
                                ->select(
                                    'result_uploads.id as result_id',
                                    'faculties.faculty_name as faculty_name',
                                    'academic_sessions.session as session',
                                    'departments.department_name as department_name',
                                    'semesters.semester as semester',
                                    'semesters.id as semester_id',
                                    'courses.course_name as course_name',
                                    'courses.id as course_id',
                                    'levels.level as level',
                                    'levels.id as level_id',
                                    'assessment_categories.category as category',
                                    'users.name as submitted_by',
                                    'result_uploads.created_at as submitted_at',
                                )
                                ->get()
                                ->groupBy(['course_id'])
                                ->map( function($courses){

                                    $course = $courses[0];

                                    return [
                                        'id'                => $course['id'],
                                        "faculty_name"      => $course['faculty_name'],
                                        "session"           => $course['session'],
                                        "department_name"   => $course['department_name'],
                                        "semester"          => $course['semester'],
                                        "course_name"       => $course['course_name'],
                                        "level"             => $course['level'],
                                        "category"          => implode(' | ', collect($courses)->pluck('category')->toArray() ),
                                        "view"              => url('/admin/results/view?')."result[]=".implode("&result[]=", collect($courses)->pluck('result_id')->toArray())

                                    ];
                                })->values();


        return view('admin.results.components.results', [ 'results' => $results ]);   

    }


    public function showCourseResults()
    {

        $validator = Validator::make( request()->all(), [
            'result'   => 'required|array',
            'result.*' => 'required|exists:result_uploads,id',
        ]);

        if( $validator-> fails() ){

            abort( 404 );
        }

        $data = $validator->validated();

        
        $results = Result::whereIn('result_upload_id', $data['result'] )
                                ->join('result_uploads', 'result_uploads.id', 'results.result_upload_id')
                                ->join('faculties', 'result_uploads.faculty_id', 'faculties.id')
                                ->join('academic_sessions', 'result_uploads.academic_session_id', 'academic_sessions.id')
                                ->join('departments', 'result_uploads.department_id', 'departments.id')
                                ->join('semesters', 'result_uploads.semester_id', 'semesters.id')
                                ->join('courses', 'result_uploads.course_id', 'courses.id')
                                ->join('levels', 'result_uploads.level_id', 'levels.id')
                                ->join('assessment_categories', 'result_uploads.assessment_category_id', 'assessment_categories.id')
                                ->select(
                                    'results.student_name',
                                    'results.mat_no',
                                    'results.score',
                                    'faculties.faculty_name as faculty_name',
                                    'academic_sessions.session as session',
                                    'departments.department_name as department_name',
                                    'semesters.semester as semester',
                                    'courses.course_name as course_name',
                                    'levels.level as level',
                                    'assessment_categories.category as category',
                                )
                                ->get()
                                ->groupBy('mat_no')
                                ->map( function( $results ){

                                    $result = $results[0];

                                    $assessments = collect( $results )->mapWithKeys( fn( $res) => [$res['category'] => $res['score'] ] );

                                    return [
                                        'faculty_name'  => $result['faculty_name'],
                                        'session'       => $result['session'],
                                        'department_name' => $result['department_name'],
                                        'semester'      => $result['semester'],
                                        'course_name'   => $result['course_name'],
                                        'level'         => $result['level'],
                                        "student_name"  => $result['student_name'],
                                        "mat_no"        => $result['mat_no'],
                                        "assessments"   => $assessments->toArray(),
                                        "total"         => $assessments->sum(),
                                        'grade'         => '',
                                        'remarks'       => ''
                                    ];
                                })->values();


        $result_data = $results->first();

        // dd( $results[0]['assessments']['CA 1'] );
        return view('admin.results.show', [ 'results' => $results, 'result_data' => $result_data ]);

    }
}
