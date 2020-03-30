<?php

namespace App\Http\Controllers\Admin\Learn;

use App\Http\Controllers\Controller;
use App\Models\Catagory;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    public function list(){
        $catagories = Catagory::orderBy('short')->get();
        return view('admin.learn.catagory.list', ['title' => 'Catagory List', 'catagories' => $catagories]);
    }

    public function add(){
        return view('admin.learn.catagory.add', ['title' => 'Catagory Add']);
    }

    public function create(Request $req){
        $catagory = new Catagory();
        $catagory->title = $req->input('title');
        $catagory->details = $req->input('details');
        $catagory->status = $req->input('status');

        $out = $catagory->save();

        return redirect(route('admincatagorylist'));
    }

    public function edit($id){
        $catagory = Catagory::find($id);
        return view('admin.learn.catagory.edit', ['title' => 'Catagory Edit', 'catagory' => $catagory]);
    }

    public function update(Request $req){
        $catagory = Catagory::find($req->id);
        $catagory->title = $req->input('title');
        $catagory->details = $req->input('details');
        $catagory->status = $req->input('status');

        $out = $catagory->save();
        return redirect(route('admincatagorylist'));
    }

    public function view($id){
        $catagory = Catagory::find($id);
        return view('admin.learn.catagory.view', ['title' => 'Catagory View', 'catagory' => $catagory]);
    }

    public function delete($id){
        $catagory = Catagory::find($id);
        $out = $catagory->delete();

        return [ 'status' => 200, 
            'message' => 'Catagory Deleted', 
            'out' => $out 
        ];
    }

    public function short(Request $req){
        $c = Catagory::find($req->id);
        $c->short = $req->short;
        $c->save();

        $out = [
            'status' => 200,
            'msg' => 'data saved'
        ];

        return $out;
    }
}