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

use App\Http\Controllers\Admin\NotificationController;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Front Parts
Route::get('/', 'HomeController@index')->name('home');
Route::post('/signup', 'HomeController@signup')->name('signup');

Route::post('/profile', 'HomeController@profile')->name('profilePost');
Route::post('/change', 'HomeController@changePassword')->name('changePassword');

Route::get('/about', 'HomeController@about')->name('about');
Route::get('/plans', 'HomeController@plans')->name('plans');

Route::get('/data', 'HomeController@data');
Route::get('/ref-code', 'HomeController@refer_code');

// Payment Controller
Route::get('/bill', 'PaymentController@bill')->name('bill');
Route::any('/payment', 'PaymentController@pay')->name('billpay');
Route::get('/payreport', 'PaymentController@report');
Route::get('/payreportlist', 'PaymentController@reportList');



// Admin Chart Create
Route::get('/ahoy/events', 'Admin\ActivityController@chartDataCreate');
// Admin Chart 
Route::get('/ahoy/chart', 'Admin\ActivityController@chartPrepaire');

// Activities Data Create
Route::post('/ahoy/visits', 'Admin\ActivityController@create');
// Activities Data cleaning
Route::get('/del_activity', 'Admin\ActivityController@delete');

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
    $users = User::all();
    return $users;
});


Route::get('/make', 'ManageController@index');
Route::get('/make/{$name}', 'ManageController@make');
Route::get('/migration', 'ManageController@migrate');


Auth::routes(['verify' => true]);

NotificationController::routes();

// API
Route::prefix('api')->group(function(){
    Route::get('info', 'HomeController@userActivityInfo');
    Route::get('admininfo','HomeController@adminActivityInfo');
});

Route::get('/api_gen/{id}', function($id){
    $user = User::find($id);
    return $user->generateToken();
});

// Admin Routes
Route::middleware(['auth', 'checkadmin'])->prefix('admin')
->namespace('Admin')->group(base_path('routes/admin.php'));

// Users Routes
Route::middleware(['auth'])->prefix('user')
->namespace('User')->group(base_path('routes/users.php'));




Route::fallback(function () {
    return view('errors.404');
});


