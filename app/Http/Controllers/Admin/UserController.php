<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.users.add', ['title' => 'Add New User']);
    }

    public function create(Request $req){
        $user = User::create([
            'fname' => $req->fname,
            'lname' => $req->lname,
            // 'name' => $req->fname.' '.$req->lname,
            'mobile' => $req->mobile,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'skype' => $req->skype,
            'address' => $req->address,
            'city' => $req->city,
            'pincode' => $req->pincode,
            'state' => $req->state,
            'country' => $req->country,
            'user_type' => 'user',
            'active' => true
        ]);
        return redirect(route('adminuserlist'));;
    }

    public function edit(User $user){
        return view('admin.users.edit', ['title' => 'Edit User', 'user'=> $user]);
    }

    public function update(Request $req){
        $inp = $req->input();
        $user = User::where('id', $inp['id'])
        ->update([
            'name'=> $inp['name'], 
            'fname'=>$inp['fname'], 
            'lname' => $inp['lname'],
            'mobile' => $inp['mobile'],
            'skype' => $inp['skype'],
            'address' => $inp['address'],
            'city' => $inp['city'],
            'pincode' => $inp['pincode'],
            'state' => $inp['state'],
            'country' => $inp['country'],
            'user_type' => $inp['user_type'],
            'active' => $inp['active']
        ]);

        return redirect(route('adminuserlist'));
    }

    public function view(User $user){
        return view('admin.users.view', ['title' => 'View User', 'user' => $user]);
    }

    public function delete(User $user){
        $out = $user->delete();
        return [ 'status' => 200, 
            'message' => 'User Deleted', 
            'out' => $out 
        ];
    }
}
