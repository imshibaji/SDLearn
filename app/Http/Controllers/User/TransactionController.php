<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
       return view('users.fund');
    }

    public function gems()
    {
        return view('users.leads');
    }
}
