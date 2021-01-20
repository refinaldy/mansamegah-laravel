<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('/tahun_akademik', 'AcademicYearController')->except('show','index');
Route::get('/tahun_akademik/{temp}/tahun', 'AcademicYearController@index');

Route::resource('/kelas', 'GradeController')->except('index', 'create');

Route::resource('siswa/', 'StudentController')->only('create','store','update');

Route::get('/siswa/tahun/{year_id}', 'StudentController@index');
Route::get('/siswa/{slug}', 'StudentController@show');
Route::get('/siswa/{id}/edit', 'StudentController@edit');
Route::delete('/siswa/{id}', 'StudentController@destroy');

Route::get('/kelas/tahun/{year_id}', 'GradeController@index');
Route::get('kelas/{year_id}/create', 'GradeController@create');


Route::resource('/kelompok_mata_pelajaran', 'SubjectGroupController');
Route::resource('/mata_pelajaran', 'SubjectController');

Route::resource('/guru', 'TeacherController');

Route::get('/guru_mata_pelajaran/create/{id}/{from_nav}', 'SubjectTeacherController@create');
Route::post('/guru_mata_pelajaran', 'SubjectTeacherController@store');
Route::delete('/guru_mata_pelajaran/{teacher}/{subject}', 'SubjectTeacherController@destroy');
Route::get('/guru_mata_pelajaran/{subject_id}/{teacher_id}/edit', 'SubjectTeacherController@edit');
Route::put('/guru_mata_pelajaran/{id}', 'SubjectTeacherController@update');
