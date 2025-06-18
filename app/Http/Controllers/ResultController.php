<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\ResultUpload;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\SimpleExcel\SimpleExcelReader;

class ResultController extends Controller
{
    public function index()
    {
        $uploads = ResultUpload::where('result_uploads.submitted_by', auth()->user()->id)
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
                                )->get();


        return view('lecturers.results.index', [ 'uploads' => $uploads ]);
    }


    public function previewUpload(Request $request)
    {

        if( session('upload-data') ){

            return view('lecturers.results.preview', [ 'data' => session('upload-data') ]);
        }

        $data = $request->validate([
            'file'          => 'required|file|mimes:xlsx,csv',
            'session'       => 'required|exists:academic_sessions,id',
            'course'        => 'required|exists:courses,id',
            'department'    => 'required|exists:departments,id',
            'faculty'       => 'required|exists:faculties,id',
            'level'         => 'required|exists:levels,id',
            'assessment_category' => 'required|exists:assessment_categories,id',
            'semester'      => 'required|exists:semesters,id',
        ]);

        $filePath = $data['file']->store('results', 'public');

        $uploads = [];
        $errors = [];
        $errorRows = [];

        SimpleExcelReader::create(storage_path('app/public/' . $filePath))
        ->getRows()
        ->each(function ($row) use (&$uploads, &$errors, &$errorRows) {
          
            try {
               
                if( ( ! isset($row['STUDENT_NAME']) ) || ( ! isset($row['MAT_NO']) ) || ( ! isset($row['SCORE']) ) ){
                    
                    $errors = "Invalid template";

                    return false;
                 
                }

                $validated = Validator::make($row, [
                    'STUDENT_NAME'  => 'required|string',
                    'MAT_NO'        => 'required|string',
                    'SCORE'         => 'required|numeric'
                ]);


                if( $validated->fails() ){

                    $errorRows[] = $row;

                    return;
                }

                $uploads[] = $row;


            } catch (\Throwable $th) {
                
                $errorRows[] = $row;
            }
           
        });

        if( count( $errors ) > 0 ){

            return back()->with([
                'upload-errors' => $errors
            ])->withInput();
        }

        if( ( count( $uploads ) === 0 ) && ( count( $errorRows ) === 0 ) ){

            return back()->with([
                'upload-errors' => "Empty template submitted"
            ])->withInput();
        }
        
        unset($data['file']);

        session([
            'upload-data' => [
                'upload-error-rows' => $errorRows,
                'valid-uploads'     => $uploads,
                'upload-filepath'   => $filePath,
                ...$data
            ]
        ]);

        
        return view('lecturers.results.preview', ['data' => session('upload-data') ]);

    }

    public function uploadResult(Request $request)
    {


        if( ! session('upload-data') ){

            return redirect()->route('upload');
        }

        $data = session('upload-data');
        

        
        $resultUpload = ResultUpload::create([
            'assessment_category_id' => $data['assessment_category'],
            'faculty_id'             => $data['faculty'],
            'department_id'          => $data['department'],
            'level_id'               => $data['level'],
            'course_id'              => $data['course'],
            'academic_session_id'    => $data['session'],
            'semester_id'            => $data['semester'],
            'submitted_by'           => auth()->user()->id,
            'file_path'              => $data['upload-filepath']
        ]);

        SimpleExcelReader::create(storage_path('app/public/' . $data['upload-filepath']))
            ->getRows()
            ->each(function ($row) use ($resultUpload) {
              
                try {
                   
                    Result::create([
                        'student_name'      => $row['STUDENT_NAME'],
                        'mat_no'            => $row['MAT_NO'],
                        'score'             => $row['SCORE'],
                        'result_upload_id'  => $resultUpload->id
                    ]);

                } catch (\Throwable $th) {
                    
                    return back()->withErrors([
                        'file' => 'Error processing row file'
                    ]);
                }
               
            });

        session()->forget('upload-data');

        return back()->with('success', 'Results uploaded successfully!');
    }
}
