<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function __construct()
    {
       // $this->middleware(['auth', 'checkadmin']);
    }

    public function index(){
        return view('admin.home', ['title' => 'My Admin Dashboard']);
    }

    public function profile(){
        return view('admin.profile');
    }
    

    // Questions Section
    public function question_list(){
        return view('admin.learn.questions.list', ['title' => 'Questions List']);
    }

    public function question_add(){
        return view('admin.learn.questions.add', ['title' => 'Question Add']);
    }

    public function question_edit(){
        return view('admin.learn.questions.edit', ['title' => 'Question Edit']);
    }

    public function question_view(){
        return view('admin.learn.questions.view', ['title' => 'Question View']);
    }

    public function question_delete(){
        return ['title'=>'Question Delete Section'];
    }


    // Comments List
    public function comment_list(){
        return view('admin.learn.comments.list', ['title' => 'Comment List']);
    }
    public function comment_add(){
        return view('admin.learn.comments.add', ['title' => 'Comment Add']);
    }

    public function comment_edit(){
        return view('admin.learn.comments.edit', ['title' => 'Comment Edit']);
    }

    public function comment_view(){
        return view('admin.learn.comments.view', ['title' => 'Comment View']);
    }

    public function comment_delete(){
        return ['title'=>'Comment Delete Section'];
    }

}
