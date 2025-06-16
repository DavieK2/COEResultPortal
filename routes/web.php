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


Route::get('/upload-result', fn() => view('lecturers.results.upload') )->middleware('auth');
Route::post('/upload-result', [ResultController::class, 'uploadResult'])->name('results.upload')->middleware('auth');



