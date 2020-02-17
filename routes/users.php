<?php

// User Section

use Illuminate\Support\Facades\Route;

Route::get('/', 'UserController@index')->name('user');
Route::get('learn', 'UserController@learn')->name('userlearn');
Route::get('jobs', 'UserController@jobs')->name('userjobs');
Route::get('reports', 'UserController@reports')->name('userreports');

Route::get('/profile', function(){
    return view('users.profile');
})->name('profile');