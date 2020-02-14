<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Course;
use App\Models\CourseAssignment;
use App\Models\Learning;
use App\Models\TopicAssignment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    // Users Area
    public function list(){
        $users = User::all();
        return view('admin.users.list', ['title' => 'User List', 'users' => $users]);
    }

    public function add(){
        $users = User::all();
        return view('admin.users.add', ['title' => 'Add New User', 'users' => $users]);
    }

    public function create(Request $req){
        $user = User::create([
            'fname' => $req->fname,
            'lname' => $req->lname,
            // 'name' => $req->fname.' '.$req->lname,
            'dob' => $req->dob,
            'profession' => $req->profession,
            'orgname' => $req->orgname,
            'mobile' => $req->mobile,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'whatsapp' => $req->whatsapp,
            'address' => $req->address,
            'city' => $req->city,
            'pincode' => $req->pincode,
            'state' => $req->state,
            'country' => $req->country,
            'user_type' => 'user',
            'reffer_by_user_id' => $req->reffer_by_user_id,
            'manage_by_user_id' => $req->manage_by_user_id,
            'active' => true
        ]);
        return redirect(route('adminuserlist'));;
    }

    public function edit(User $user){
        $users = User::all();
        return view('admin.users.edit', ['title' => 'Edit User', 'user'=> $user, 'users' => $users]);
    }

    public function update(Request $req){
        $inp = $req->input();
        $pass = User::find($inp['id'])->password;
        if($inp['new_password']!= null){ 
            $pass = Hash::make($inp['new_password']);
        }

        $user = User::where('id', $inp['id'])
        ->update([
            // 'name'=> $inp['name'], 
            'password'=> $pass,
            'fname'=>$inp['fname'], 
            'lname' => $inp['lname'],
            'dob' => $inp['dob'],
            'profession' => $inp['profession'],
            'orgname' => $inp['orgname'],
            'mobile' => $inp['mobile'],
            'whatsapp' => $inp['whatsapp'],
            'address' => $inp['address'],
            'city' => $inp['city'],
            'pincode' => $inp['pincode'],
            'state' => $inp['state'],
            'country' => $inp['country'],
            'user_type' => $inp['user_type'],
            'reffer_by_user_id' => $inp['reffer_by_user_id'],
            'manage_by_user_id' => $inp['manage_by_user_id'],
            'active' => $inp['active']
        ]);

        return redirect(route('adminuserlist'));
    }

    public function view(User $user){
        $courses = Course::where('status', 'active')->get();
        $learning = Learning::where('user_id', $user->id)->first();

        return view('admin.users.view', [
            'title' => 'User Details', 
            'user' => $user, 
            'courses' => $courses,
            'learn' => $learning
        ]);
    }

    public function delete(User $user){
        $out = $user->delete();
        return [ 'status' => 200, 
            'message' => 'User Deleted', 
            'out' => $out 
        ];
    }



    public function data(Request $req){
        $user = User::find($req->uid ?? 1);
        $assign = $user->assignments;

        return $assign;
    }

    public function checkCourseAssignment(Request $req){
        $assign = CourseAssignment::where('user_id', $req->uid)->get();
        return $assign;
    }

    public function checkTopicAssignment(Request $req){
        $assign = TopicAssignment::where('user_id', $req->uid)->get();
        return $assign;
    }

    public function course_assign(Request $req){
        $ca = CourseAssignment::firstOrCreate([
            'user_id'=> $req->uid, 
            'course_id' => $req->cid
        ]);
        $ca->save();
        return $ca->id;
    }

    public function course_unassign(Request $req){
        $assign = CourseAssignment::where('user_id', $req->uid)->where('course_id', $req->cid)->first();
        $assign->delete(); 
    }

    public function topic_assign(Request $req){
        $ta = TopicAssignment::firstOrCreate([
            'user_id'=> $req->uid,
            'topic_id' => $req->tid
        ]);
        $ta->save();
        return $ta->id;
    }

    public function topic_unassign(Request $req){
        $assign = TopicAssignment::where('user_id', $req->uid)->where('topic_id', $req->tid)->first();
        $assign->delete();
    }


    public function learning_update(Request $req){
        $learning = Learning::updateOrCreate(
            ['user_id' => $req->user_id, 'id' => $req->lid],
            [
                'user_id' => $req->user_id,
                'title' => $req->title,
                'message' => $req->message,
                'total_learning_length' => $req->total_learning_length,
                'skills' => $req->skills,
                'tasks' => $req->tasks,
                'learning_points' => $req->learning_points,
                'design_points' => $req->design_points,
                'developing_points' => $req->developing_points,
                'debugging_points' => $req->debugging_points
            ]
        );
        $learning->save();
        return back();
    }
}
