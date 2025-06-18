<?php

namespace App\Http\Controllers\Officials;

use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\ResultUpload;
use Illuminate\Http\Request;

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


        return view('admin.results.index', [ 'uploads' => $uploads ]);
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

        return view('admin.results.show', [ 'results' => $results, 'result_data' => $result_data ]);
    }
}
