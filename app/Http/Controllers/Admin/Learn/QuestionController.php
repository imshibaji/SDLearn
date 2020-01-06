<?php

namespace App\Http\Controllers\Admin\Learn;

use App\Http\Controllers\Controller;
use App\models\Course;
use App\models\Topic;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // Questions Section
    public function list(){
        return view('admin.learn.questions.list', ['title' => 'Questions List']);
    }

    public function topic_by_course($id){
        return Course::find($id)->topics;
    }

    public function add(){
        $courses = Course::all();
        return view('admin.learn.questions.add', ['title' => 'Question Add', 'courses' => $courses]);
    }

    public function create(Request $req){
        return $req->input();
    }

    public function edit(){
        return view('admin.learn.questions.edit', ['title' => 'Question Edit']);
    }

    public function view(){
        return view('admin.learn.questions.view', ['title' => 'Question View']);
    }

    public function delete(){
        return ['title'=>'Question Delete Section'];
    }

}
