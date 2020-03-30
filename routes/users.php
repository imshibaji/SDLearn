<?php

// User Section

use Illuminate\Support\Facades\Route;

Route::get('/', 'UserController@index')->name('user');
Route::get('courses', 'UserController@courses')->name('usercourses');
Route::get('course-details/{id}', 'UserController@course_details')->name('usercdetails');
Route::get('learn', 'UserController@learn')->name('userlearn');
Route::post('assesment', 'UserController@assesment')->name('userassesment');
Route::get('retry/{tid}', 'UserController@retry')->name('userretry');
Route::get('jobs', 'UserController@jobs')->name('userjobs');
Route::get('reports', 'UserController@reports')->name('userreports');

Route::get('transaction', 'TransactionController@index')->name('transactions');
Route::get('gems', 'TransactionController@gems')->name('usergems');

Route::get('/profile', function(){
    return view('users.profile');
})->name('profile');