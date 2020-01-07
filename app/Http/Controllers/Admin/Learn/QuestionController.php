<?php

namespace App\Http\Controllers\Admin\Learn;

use App\Http\Controllers\Controller;
use App\models\Course;
use App\models\Question;
use App\models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    // Questions Section
    public function list(){
        $questions = Question::orderBy('short')->get();
        return view('admin.learn.questions.list', ['title' => 'Questions List', 'questions' => $questions ]);
    }

    public function topic_by_course($id){
        return Course::find($id)->topics;
    }

    public function add(){
        $courses = Course::where('status', 'active')->get();
        return view('admin.learn.questions.add', ['title' => 'Question Add', 'courses' => $courses]);
    }

    public function create(Request $req){
        $q = new Question();
        $q->topic_id = $req->input('topic_id');
        $q->question = $req->input('question');
        $q->qtype = $req->input('qtype');
        $q->opt = json_encode($req->input('opt'));
        $q->ans = json_encode($req->input('ans'));
        $q->answer = $req->input('answer');
        $q->design_points = $req->input('design_points');
        $q->development_points = $req->input('development_points');
        $q->debugging_points = $req->input('debugging_points');
        $q->duration = json_encode($req->input('duration'));
        $q->status = $req->input('status');
        $q->user_id = Auth::id();

        $out = $q->saveOrFail();

        if($out)
            return redirect(route('adminquestionlist'));
        else
            return redirect(route('adminquestionadd'));
    }

    public function edit($id){
        return view('admin.learn.questions.edit', ['title' => 'Question Edit']);
    }

    public function view($id){
        return view('admin.learn.questions.view', ['title' => 'Question View']);
    }

    public function delete($id){
        return ['title'=>'Question Delete Section'];
    }

    public function short(Request $req){
        $q = Question::find($req->id);
        $q->short = $req->short;
        $q->save();

        $out = [
            'status' => 200,
            'msg' => 'data saved'
        ];

        return $out;
    }

}
