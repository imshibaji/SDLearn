<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\models\Course;
use App\models\Topic;
use App\Models\UserAssesment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }
    public function index(){
        Artisan::call('inspire');
        $inspaire = Artisan::output();
        return view('users.home', compact('inspaire'));
    }

    public function courses(){
        $courses = Course::where('status', 'active')->orderBy('short')->get();
        return view('users.courses', ['courses' => $courses]);
    }

    public function course_details(Request $req){
        $course = Course::where('id', $req->id)->where('status', 'active')->first();
        return view('users.course-details', [ 'course' => $course ]);
    }

    public function learn(Request $req){
        $courses = Auth::user()->courseAssignments;
        $assesments = Auth::user()->userAssesments()->where('topic_id', $req->tid)->get();
        $topics = Auth::user()->topicAssignments;
        $topic = Topic::find($req->tid);
        

        return view('users.learn', [
            'title' => 'Learning Section',
            'courses' => $courses, 
            'topics' => $topics, 
            'topic' => $topic,
            'assesments' => $assesments
        ]);
        // return $learnings;
    }

    public function assesment(Request $req){
        $topic = Topic::find($req->topic_id);
        $questions = $topic->questions;
        $report = [];
        $design_points = 0;
        $development_points = 0;
        $debugging_points = 0;
        $marks = 0;

        // Questions Set
        foreach($questions as $q){
            $ans = json_decode($q->ans);
            $inputAns = $req->input('ans'.$q->id);

            if($q->qtype == 1 || $q->qtype == 2){
                $inputAns = json_encode($inputAns);
                $ans = json_encode($ans);

                $rep['qid'] = $q->id;
                $rep['title'] = $q->question;
                $rep['answer'] = $q->answer;

                if($inputAns == $ans){
                    $design_points += $q->design_points;
                    $development_points += $q->development_points;
                    $debugging_points += $q->debugging_points;

                    $marks = $design_points + $development_points + $debugging_points;
                    $rep['remark'] = 'Correct';
                }else{
                    $rep['remark'] = 'InCorrect';
                };

                $rep['user_answer'] = 'You choose '.$inputAns.' option';

                array_push($report, $rep);

            } else if($q->qtype == 3){
                $rep['id'] = $q->id;
                $rep['title'] = $q->question;
                $rep['answer'] = $q->answer;

                $design_points += $q->design_points;
                $development_points += $q->development_points;
                $debugging_points += $q->debugging_points;

                $marks = $design_points + $development_points + $debugging_points;

                $rep['user_answer'] = $inputAns;
                $rep['remark'] = 'Thoughtful';

                array_push($report, $rep);
            }
        }

        $assesment = [ 
            'topic' => $topic->title,
            'report' => $report,
            'design' => $design_points, 
            'development' => $development_points, 
            'debug' => $debugging_points, 
            'total' => $marks
        ];

        $asses = new UserAssesment();
        $asses->user_id = Auth::id();
        $asses->topic_id = $req->topic_id;
        $asses->assesment = json_encode($assesment);
        $asses->save();

        // return ['request'=>$req->input(), 'assesment' => $asses ];
        return back();
    }

    public function retry($tid){
        $asses = UserAssesment::where('user_id', Auth::id())->where('topic_id', $tid)->first();
        $asses->delete();

        return back();
    }


    public function reports(){
        return view('users.report');
    }

    public function jobs(){
        return view('users.jobs');
    }
}
