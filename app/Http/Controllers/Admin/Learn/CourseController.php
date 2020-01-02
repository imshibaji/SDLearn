<?php

namespace App\Http\Controllers\Admin\Learn;

use App\Http\Controllers\Controller;
use App\models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function list(){
        $courses = Course::orderBy('short')->get();
        return view('admin.learn.course.list', ['title' => 'Course List', 'courses' => $courses]);
    }

    public function add(){
        return view('admin.learn.course.add', ['title' => 'Course Add']);
    }

    public function create(Request $req){
        $course = new Course();
        $course->title = $req->input('title');
        $course->courseid = $req->input('courseid');
        $course->slag = $req->input('slag');
        $course->meta_keys = $req->input('meta_keys');
        $course->meta_desc = $req->input('meta_desc');
        $course->details = (string) $req->input('details');
        $course->duration = json_encode($req->input('duration'));
        $course->status = $req->input('status');
        $course->premium_status = $req->input('premium_status');
        $course->price = $req->input('price');
        $course->user_id = Auth::id();

        $out = $course->save();

        // $course = Course::create($req->all());

        return redirect(route('admincourselist'));
    }

    public function edit($id){
        $course = Course::find($id);
        return view('admin.learn.course.edit', ['title' => 'Course Edit', 'course' => $course]);
    }

    public function update(Request $req){
        $course = Course::find($req->id);
        $course->title = $req->input('title');
        $course->courseid = $req->input('courseid');
        $course->slag = $req->input('slag');
        $course->meta_keys = $req->input('meta_keys');
        $course->meta_desc = $req->input('meta_desc');
        $course->details = (string) $req->input('details');
        $course->duration = json_encode($req->input('duration'));
        $course->status = $req->input('status');
        $course->premium_status = $req->input('premium_status');
        $course->price = $req->input('price');
        $course->user_id = Auth::id();

        $out = $course->save();
        return redirect(route('admincourselist'));
    }

    public function view($id){
        $course = Course::find($id);
        return view('admin.learn.course.view', ['title' => 'Course View', 'course' => $course]);
    }

    public function delete($id){
        $course = Course::find($id);
        $out = $course->delete();

        return [ 'status' => 200, 
            'message' => 'Course Deleted', 
            'out' => $out 
        ];
    }

    public function short(Request $req){
        $c = Course::find($req->id);
        $c->short = $req->short;
        $c->save();

        $out = [
            'status' => 200,
            'msg' => 'data saved'
        ];

        return $out;
    }
}
