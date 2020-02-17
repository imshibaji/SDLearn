<?php

//////////////////////
/// Admin Sections ///
//////////////////////

use App\Http\Controllers\Admin\AssignController;
use App\Http\Controllers\Admin\LearningController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', 'AdminController@index')->name('admin');
Route::get('profile', 'AdminController@profile')->name('admin-profile');

// Users Section

UserController::routes();

LearningController::routes();

// Route::prefix('user')->group(function(){
//     Route::get('list', 'UserController@list')->name('adminuserlist');
//     Route::get('add', 'UserController@add')->name('adminuseradd');
//     Route::post('create', 'UserController@create')->name('adminusercreate');
//     Route::get('edit/{user}', 'UserController@edit')->name('adminuseredit');
//     Route::post('update', 'UserController@update')->name('adminuserupdate');
//     Route::get('view/{user}', 'UserController@view')->name('adminuserview');
//     Route::post('delete/{user}', 'UserController@delete')->name('adminuserdelete');
// });

AssignController::routes();

// Route::prefix('assign')->group(function(){
//     Route::get('course', 'UserController@course_assign')->name('courseassign');
//     Route::get('courseunset', 'UserController@course_unassign')->name('courseassignunset');

//     Route::get('topic', 'UserController@topic_assign')->name('topicassign');
//     Route::get('topicunset', 'UserController@topic_unassign')->name('topicassignunset');

//     Route::get('noset', 'UserController@noassign')->name('noassign');
//     Route::get('check', 'UserController@checkCourseAssignment')->name('assigncheck');
//     Route::get('data', 'UserController@data')->name('assigndata');


//     Route::post('learning', 'UserController@learning_update')->name('assignlearning');
// });

Route::prefix('learn')->group(function(){
    // Course Section
    Route::prefix('course')->group(function(){
        Route::get('list', 'Learn\CourseController@list')->name('admincourselist');
        Route::get('add', 'Learn\CourseController@add')->name('admincourseadd');
        Route::post('create', 'Learn\CourseController@create')->name('admincoursecreate');
        Route::get('edit/{id}', 'Learn\CourseController@edit')->name('admincourseedit');
        Route::post('update', 'Learn\CourseController@update')->name('admincourseupdate');
        Route::get('view/{id}', 'Learn\CourseController@view')->name('admincourseview');
        Route::post('delete/{id}', 'Learn\CourseController@delete')->name('admincoursedelete');
        Route::post('short', 'Learn\CourseController@short')->name('admincourseshort');
    });


    // Topics Section
    Route::prefix('topic')->group(function(){
        Route::get('list', 'Learn\TopicController@list')->name('admintopiclist');
        Route::get('add', 'Learn\TopicController@add')->name('admintopicadd');
        Route::post('create', 'Learn\TopicController@create')->name('admintopiccreate');
        Route::get('edit/{topic}', 'Learn\TopicController@edit')->name('admintopicedit');
        Route::post('update', 'Learn\TopicController@update')->name('admintopicupdate');
        Route::get('view/{topic}', 'Learn\TopicController@view')->name('admintopicview');
        Route::post('delete/{topic}', 'Learn\TopicController@delete')->name('admintopicdelete');
        Route::post('short', 'Learn\TopicController@short')->name('admintopicshort');
    });


    // Question Section
    Route::prefix('question')->group(function(){
        Route::get('topic/{id}', 'Learn\QuestionController@topic_by_course')->name('admingettopics');
        Route::get('list', 'Learn\QuestionController@list')->name('adminquestionlist');
        Route::get('add', 'Learn\QuestionController@add')->name('adminquestionadd');
        Route::post('create', 'Learn\QuestionController@create')->name('adminquestioncreate');
        Route::get('edit/{id}', 'Learn\QuestionController@edit')->name('adminquestionedit');
        Route::post('update', 'Learn\QuestionController@update')->name('adminquestionupdate');
        Route::get('view/{id}', 'Learn\QuestionController@view')->name('adminquestionview');
        Route::post('delete/{question}', 'Learn\QuestionController@delete')->name('adminquestiondelete');
        Route::post('short', 'Learn\QuestionController@short')->name('adminquestionshort');
    });


    // Comments Section
    Route::prefix('comment')->group(function(){
        Route::get('list', 'AdminController@comment_list')->name('admincommentlist');
        Route::get('add', 'AdminController@comment_add')->name('admincommentadd');
        Route::get('edit', 'AdminController@comment_edit')->name('admincommentedit');
        Route::get('view', 'AdminController@comment_view')->name('admincommentview');
        Route::get('delete', 'AdminController@comment_delete')->name('admincommentdelete');
    });
});
// End Learn Section Route














