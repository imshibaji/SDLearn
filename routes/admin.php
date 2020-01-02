<?php

//////////////////////
/// Admin Sections ///
//////////////////////

Route::get('/', 'AdminController@index')->name('admin');
Route::get('profile', 'AdminController@profile')->name('admin-profile');

// Users Section
Route::prefix('user')->group(function(){
    Route::get('list', 'UserController@list')->name('adminuserlist');
    Route::get('add', 'UserController@add')->name('adminuseradd');
    Route::post('create', 'UserController@create')->name('adminusercreate');
    Route::get('edit/{user}', 'UserController@edit')->name('adminuseredit');
    Route::post('update', 'UserController@update')->name('adminuserupdate');
    Route::get('view/{user}', 'UserController@view')->name('adminuserview');
    Route::post('delete/{user}', 'UserController@delete')->name('adminuserdelete');
});

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
    Route::get('topic/list', 'Learn\TopicController@list')->name('admintopiclist');
    Route::get('topic/add', 'Learn\TopicController@add')->name('admintopicadd');
    Route::post('topic/create', 'Learn\TopicController@create')->name('admintopiccreate');
    Route::get('topic/edit/{topic}', 'Learn\TopicController@edit')->name('admintopicedit');
    Route::post('topic/update', 'Learn\TopicController@update')->name('admintopicupdate');
    Route::get('topic/view/{topic}', 'Learn\TopicController@view')->name('admintopicview');
    Route::post('topic/delete/{topic}', 'Learn\TopicController@delete')->name('admintopicdelete');
    Route::post('topic/short', 'Learn\TopicController@short')->name('admintopicshort');


    // Question Section
    Route::prefix('question')->group(function(){
        Route::get('list', 'AdminController@question_list')->name('adminquestionlist');
        Route::get('add', 'AdminController@question_add')->name('adminquestionadd');
        Route::get('edit', 'AdminController@question_edit')->name('adminquestionedit');
        Route::get('view', 'AdminController@question_view')->name('adminquestionview');
        Route::get('delete', 'AdminController@question_delete')->name('adminquestiondelete');
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














