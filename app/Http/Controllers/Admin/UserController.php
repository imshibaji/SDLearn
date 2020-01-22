<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Course;
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
        return view('admin.users.view', ['title' => 'View User', 'user' => $user, 'courses' => $courses]);
    }

    public function delete(User $user){
        $out = $user->delete();
        return [ 'status' => 200, 
            'message' => 'User Deleted', 
            'out' => $out 
        ];
    }
}
