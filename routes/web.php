<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('login');
    } else {
        return redirect()->route('home');
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::view('/years', 'admin.years.years');
    Route::view('/levels', 'admin.levels.levels');
    Route::view('/teachers', 'admin.teachers.teachers');
    Route::post('/teachers', [\App\Http\Controllers\HomeController::class, 'updateImage'])->name('teachers.updateStamp');
    Route::view('/classes', 'admin.classes.classes');
    Route::view('/settings', 'admin.settings.settings');
    Route::view('/users', 'admin.users.users');
    Route::get('students/{id}', function ($id) {
        return view('admin.classes.students.students', compact('id'));
    });
    Route::get('result/{id}', function ($id) {
        return view('admin.classes.students.result', compact('id'));
    });
    Route::get('certificate/{id}', function ($id) {
        return view('admin.classes.students.certificate', compact('id'));
    });
    Route::get('certificate/{result}/show', function (\App\Models\ResultDegree $result) {

        return view('admin.classes.students.certificateShow', compact('result'));
    });
    Route::get('certificate/{result}/pass', function (\App\Models\ResultDegree $result) {
        $semester = $result->result->semester == 1 ? 2 : 1;

        $student = $result->student;

        $resultResult = \App\Models\Result::where([['year_id', $result->result->year_id], ['class_id', $result->result->class_id], ['semester', $semester]])->first();

        if ($resultResult) {


        $result2 = $student->resultDegree()->where(['result_id' => $resultResult->id, 'student_id' => $student->id])->first();
        }else{
            $result2=null;
        }
        return view('admin.classes.students.passCertificateShow', compact('result','result2'));
    });
    Route::resource('/students', App\Http\Controllers\StudentController::class);

    Route::get('cer', function () {
        return view('certificates.level');
    });

    Route::get('cer_2', function () {
        return view('certificates.level_2');
    });

    Route::get('cer_3', function () {
        return view('certificates.mothers');
    });
    Route::get('cer_4', function () {
        return view('certificates.levels');
    });

    Route::get('cer_5', function () {
        return view('certificates.listener');
    });

    Route::get('cer_6', function () {
        return view('certificates.review');
    });
    Route::get('profile', function () {
        return view('userProfile');
    });
});
