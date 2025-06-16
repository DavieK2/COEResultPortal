<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelReader;

class ResultController extends Controller
{
    public function uploadResult(Request $request)
    {
        $data = $request->validate([
            'file'          => 'required|file|mimes:xlsx,csv',
            'session'       => 'required|exists:academic_sessions,id',
            'course'        => 'required|exists:courses,id',
            'department'    => 'required|exists:departments,id',
            'faculty'       => 'required|exists:faculties,id',
            'level'         => 'required|exists:levels,level',
            'assessment_category' => 'required|exists:assessment_categories,id',
            'semester'      => 'required|exists:semesters,id',
        ]);


        $filePath = $data['file']->store('results', 'public');

        SimpleExcelReader::create(storage_path('app/public/' . $filePath))
            ->getRows()
            ->each(function ($row) use ($data, $filePath) {
              
                try {
                   
                    Result::create([
                        'student_name'      => $row['STUDENT_NAME'],
                        'mat_no'            => $row['MAT_NO'],
                        'score'             => $row['SCORE'],
                        'assessment_category' => $data['assessment_category'],
                        'faculty'           => $data['faculty'],
                        'department'        => $data['department'],
                        'course'            => $data['course'],
                        'session'           => $data['session'],
                        'semester'          => $data['semester'],
                        'submitted_by'      => User::first()->id,
                        'file_path'         => $filePath,
                    ]);

                } catch (\Throwable $th) {
                    
                    return back()->withErrors([
                        'file' => 'Error processing row file'
                    ]);
                }
               
            });

      

        return back()->with('success', 'Results uploaded successfully!');
    }
}
