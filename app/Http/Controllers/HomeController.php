<?php

namespace App\Http\Controllers;

use App\Models\Learning;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    private $util;
    public function __construct()
    {
        $this->util = (object) include_once(resource_path('utils/util.php'));
    }

    public function index(){
        $uid = Auth::id();
        if($uid){
            return redirect('user');
        }

        $states = $this->getStates();
        $countries = $this->getCountry();
        $cities = $this->getCities();
        
        return view('fronts.main', 
        [
            'states' => $states, 
            'countries' => $countries,
            'cities' => $cities
        ]);
    }

    public function signup(Request $req){
        $ref = 1;
        if($req->ref){
            $ref = base64_decode($req->ref);
        }

        $user = User::create([
            'fname' => $req->fname,
            'lname' => $req->lname,
            // 'name' => $req->fname.' '.$req->lname,
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
            'reffer_by_user_id' => $ref,
            'manage_by_user_id' => 1,
            'active' => true
        ]);

        $id = $user->id;
        if($id>0){
            return redirect('next');
        }
        return redirect('home');
    }

    public function success(){
        return view('fronts.next');
    }

    public function about()
    {
        return view('fronts.about');
    }

    public function plans(){
        return view('fronts.plans');
    }

    public function data(Request $req)
    {

        // return Auth::user();
        return base64_encode($req->ref);
    }

    public function refer_code()
    {
        $user = Auth::user();
        return base64_encode($user->id);
    }

    public function getCities(){
        return $this->util->cities;
    }

    public function getStates(){
        return $this->util->states;
    }

    public function getCountry(){
        return $this->util->countries;
    }

    public function adminActivityInfo(){
        $user = Auth::user();
        return $user;
    }

    public function userActivityInfo(){
        $learn = Auth::user()->learning;
        return [
            // User Activity Information
            'totalAmt' => '0',
            'dueAmt' => '1000',
            'learning' => 'Total 10',
            'earning' => '100',
            // Course Name and Details Section
            'title' => $learn->title,
            'message' => $learn->message,
            'skills' => $learn->skills,
            'tasks' => $learn->tasks,
            'learn' => $learn->learning_points,
            // Chart Section
            'length' => $learn->total_learning_length,
            'design' => [12,13,20,30],
            'develop' => [6,8,7,23],
            'debug' => [6,5,13,7],
            // Report Section
            'total_design' => $learn->design_points,
            'total_develop' => $learn->developing_points,
            'total_debug' => $learn->debugging_points
        ];
    }
}
