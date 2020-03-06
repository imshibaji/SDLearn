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
        $learnings = [
            [
                'id' => 0,
                'title' => 'Website Layout Design', 
                'details' => 'This is Very Essential Course', 
                'highlight' => 'show',
            ],
            [
                'id' => 1,
                'title' => 'Website Design with HTML5, CSS3, JS', 
                'details' => 'This is Very Essential Course', 
                'highlight' => 'show',
            ],
            [
                'id' => 2,
                'title' => 'Advanced JavaScript, JQuery', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 3,
                'title' => 'Core PHP', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 4,
                'title' => 'SQL/MySQL Development', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 5,
                'title' => 'Codeigniter Framework Development', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 6,
                'title' => 'Laravel Framework Development', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 7,
                'title' => 'Wordpress Theme Development', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 8,
                'title' => 'Wordpress Pluggins Development', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 9,
                'title' => 'NodeJS Development', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 10,
                'title' => 'ExpressJS Development', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 11,
                'title' => 'NoSQL Development', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 12,
                'title' => 'Angular Development', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 13,
                'title' => 'ReactJS Development', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 14,
                'title' => 'VueJS Development', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 15,
                'title' => 'Core Python Training', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 16,
                'title' => 'Flask Python', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 17,
                'title' => 'Python Datascience', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 18,
                'title' => 'JavaScript AI Development', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 19,
                'title' => 'Blockchain Development', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 20,
                'title' => 'Java Development', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 21,
                'title' => 'Android App Development', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 22,
                'title' => 'Mobile App Development', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 23,
                'title' => 'Linux Server Management', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 24,
                'title' => 'Docker Instance Management', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 25,
                'title' => 'Software Design Pattern', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 26,
                'title' => 'Software Algorithm', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 27,
                'title' => 'C, C++, Programming', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 28,
                'title' => 'Assembly Language', 
                'details' => 'This is Very Essential Course', 
            ],
            [
                'id' => 29,
                'title' => 'Embeded Systems Development', 
                'details' => 'This is Very Essential Course', 
            ]
        ];
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
