<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class NotificationController extends Controller
{
    public function list(){
        return view('admin.notify.list');
    }

    public function add(){
        return view('admin.notify.add');
    }

    public function create(Request $req){
        $data = [
            "user_id" => $req->uid,
            "title" => $this->short_code($req->title, Auth::user()),
            "details" => $this->short_code($req->details, Auth::user()),
            "sending_time" => $req->sending_date.' '.$req->sending_time,
            "expaire_at" => $req->expaire_date.' '.$req->expaire_time,
            "notify_type" => $req->notify_type,
            "premium_type" => $req->premium_type,
            "user_type" => $req->user_type
        ];
        return $data;
    }

    public function edit(){
        return view('admin.notify.edit');
    }

    public function update(Request $req){
        return $req;
    }

    public function delete(){

    }

    public function view(){

    }

    public static function routes(){
        Route::get('admin/notify/list', 'Admin\NotificationController@list')->name('adminnotifylist');
        Route::get('admin/notify/add', 'Admin\NotificationController@add')->name('adminnotifyadd');
        Route::post('admin/notify/create', 'Admin\NotificationController@create')->name('adminnotifycreate');
        Route::get('admin/notify/edit', 'Admin\NotificationController@edit')->name('adminnotifyedit');
        Route::post('admin/notify/update', 'Admin\NotificationController@update')->name('adminnotifyupdate');
        Route::get('admin/notify/view', 'Admin\NotificationController@view')->name('adminnotifyview');
        Route::post('admin/notify/delete', 'Admin\NotificationController@delete')->name('adminnotifydelete');
    }

    private function short_code($msg, $user){
        $ua = $user;
        $tokens = ['fname', 'lname', 'email', 'mobile', 'dob', 'profession', 'orgname', 'whatsapp', 'address', 'city', 'pincode', 'state', 'country'];

        $message = $msg;
        foreach($tokens as $token){
            $message = str_ireplace('['.$token.']', $ua[$token], $message);
        }

        return $message;
    }
}
