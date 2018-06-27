<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/student', 'HomeController@student')->name('student');
Route::get('/activity_view', 'ActivityController@view')->name('activity_view');

Route::get('/temp', 'HomeController@temp')->name('temp');

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
    Route::resource('roles', 'RoleController');
    Route::resource('users', 'UserController');
});

Route::group(['prefix' => 'professor', 'middleware' => ['role:professor|admin|student']], function () {
    Route::resource('courses', 'CourseController');
    Route::resource('files', 'FileController');
    Route::resource('questions', 'QuestionController');
});

Route::group(['prefix' => 'student', 'middleware' => ['role:student|parent|professor|admin']], function () {
    Route::resource('posts', 'PostController');
    Route::resource('comments', 'CommentController');
});

Route::group(['prefix' => 'exams', 'middleware' => ['role:student|professor|admin']], function () {
    Route::resource('exams', 'ExamController');
    Route::get('take', 'ExamController@take')->name('take');
    //Route::get('submit', 'ExamController@submit');
    Route::post('submit', 'ExamController@submit');
});

Route::group(['prefix' => 'schedules', 'middleware' => ['role:student|professor|admin']], function () {
    Route::resource('schedules', 'ScheduleController');
});

Route::group(['middleware' => ['role:student']], function () {
    Route::resource('activity', 'ActivityController');
});
