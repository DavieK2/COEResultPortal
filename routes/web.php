<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ResultController;
use App\Models\Department;
use Illuminate\Support\Facades\Route;


Route::get('/login', fn() => view('auth.login') );
Route::post('/login', [AuthController::class, 'login'] )->name('login');


Route::get('/get-departments/{faculty_id}', function($faculty_id){
    return response()->json([
        'departments' => Department::where('faculty_id', $faculty_id)->get()
    ]);
})->name('get-departments');


Route::get('/uploads', [ResultController::class, 'index']  )->name('upload.index')->middleware('auth');
Route::get('/upload-result', fn() => view('lecturers.results.upload') )->name('upload')->middleware('auth');
Route::post('/upload-result', [ResultController::class, 'previewUpload'])->name('preview.upload')->middleware('auth');
Route::post('/complete-upload', [ResultController::class, 'uploadResult'])->name('results.upload')->middleware('auth');





Route::get('/admin/results', fn() => view('admin.results.index') );