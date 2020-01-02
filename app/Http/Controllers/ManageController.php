<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ManageController extends Controller
{
    public function __construct()
    {
        
    }
    public function index(){

    }
    public function make($name){
        $out = Artisan::call("make:controller", ['name' => $name]);
        return $out;
    }
    public function migrate(){
        $out = Artisan::call("migrate", []);
        return $out;
    }
}
