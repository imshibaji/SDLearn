<?php

namespace App\Http\Controllers;

use App\Models\Learning;
use App\Models\Money;
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

    public function profile(Request $req){
        if($req->uid){
            $user = User::find($req->uid);
            $user->email = $user->email;
            $user->fname = $req->fname;
            $user->lname = $req->lname;
            $user->mobile = $req->mobile;
            $user->email = $req->email;
            $user->whatsapp = $req->whatsapp;
            $user->address = $req->address;
            $user->city = $req->city;
            $user->pincode = $req->pincode;
            $user->state = $req->state;
            $user->country = $req->country;
            $user->save();

            session()->flash('status', 'Profile Updated.');
        }else{
            session()->flash('status', 'Profile not Updated.');
        }
        return back();
    }

    public function changePassword(Request $req){

        if($req->input('new-password') == $req->input('confirm-password')){
            $user = User::where('email', $req->email)
            ->first();

            if(Hash::check($req->input('current-password'), Auth::user()->password)){
                $user->password =  Hash::make($req->input('new-password'));
                $user->save();

                session()->flash('status', 'Password Changed.');
            }else{
                session()->flash('status', 'Email and Password Not Match with Our Records.');
            }
        }else{
            session()->flash('status', 'New Password and Confirm Password Not Matched.');
        }
        return back();
    }

    public function userActivityInfo(){
        $learn = Auth::user()->learning;
        $chart = json_decode($learn->reports_chart ?? '[]');
        $money = Auth::user()->money()->get()->last();
        $gems = Auth::user()->gems()->get()->last();

        $userPay = Money::where('user_id',Auth::id())->get();
        // dump($userPay->sum('addition_amt'));

        $taskName = array_map(function($obj){
            return $obj->task_name ?? '';
        }, $chart);

        $design = array_map(function($obj){
            return $obj->design_point ?? 0;
        }, $chart);

        $develop = array_map(function($obj){
            return $obj->develop_points ?? 0;
        }, $chart);

        $debug = array_map(function($obj){
            return $obj->debug_points ?? 0;
        }, $chart);

        
        return [
            // User Activity Information
            'totalAmt' => $userPay->sum('addition_amt'),
            'dueAmt' => $money->balance_amt ?? 0,
            'learning' => 'Total '.$learn->learning_points ?? 0,
            'earning' => $gems->balance_gems ?? 0,
            // Course Name and Details Section
            'title' => $learn->title,
            'message' => $learn->message,
            'skills' => $learn->skills,
            'tasks' => $learn->tasks,
            'learn' => $learn->learning_points,
            // Chart Section
            'length' => $learn->total_learning_length,
            'taskName' => $taskName,
            'design' => $design,
            'develop' => $develop,
            'debug' => $debug,
            // Report Section
            'total_design' => $learn->design_points,
            'total_develop' => $learn->developing_points,
            'total_debug' => $learn->debugging_points,
        ];
    }
}
