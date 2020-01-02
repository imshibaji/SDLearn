<?php

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

use App\Models\Business;
use App\User;

// Front Parts
Route::get('/', 'HomeController@index')->name('home');
Route::post('/signup', 'HomeController@signup')->name('signup');
Route::get('/next', 'HomeController@success')->name('next');

Route::get('/about', 'HomeController@about')->name('about');
Route::get('/plans', 'HomeController@plans')->name('plans');



Route::get('/jobs', function () {
    return view('fronts.jobs');
});

Route::get('/job-details', function () {
    return view('fronts.job-details');
});

Route::get('/candidates', function () {
    return view('fronts.candidates');
});

Route::get('/cand-details', function () {
    return view('fronts.cand-details');
});

Route::get('/add', function(){
    return view('admin.business-add');
});


Route::get('/get', function () {
    // $business = Business::all();
    $users = User::all();
    return $users;
});


Route::get('/make/{$name}', 'ManageController@make');
Route::get('/migration', 'ManageController@migration');

Auth::routes();


// Admin Routes
Route::middleware(['auth', 'checkadmin'])->prefix('admin')
->namespace('Admin')->group(base_path('routes/admin.php'));

// Users Routes
Route::middleware(['auth'])->prefix('user')
->namespace('User')->group(base_path('routes/users.php'));



