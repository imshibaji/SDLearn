<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Learning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class LearningController extends Controller
{
    public function create_update(Request $req){
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
                'debugging_points' => $req->debugging_points,
                // 'reports_chart' => $this->put_learning($req)
            ]
        );
        $learning->save();
        $this->put_learning($req);
        return back();
    }

    public function put_learning(Request $req)
    {
        $learn = Learning::find($req->lid);
        $chart = $learn->reports_chart ?? [];
        $chart = json_decode($chart);
        array_push($chart, $req->reports_chart);

        if($req->reports_chart['task_name'] != null){
            $learning = Learning::updateOrCreate(
                ['user_id' => $req->user_id, 'id' => $req->lid],
                [
                    'reports_chart' => $chart
                ]
            );
            $learning->save();
        }
        return $chart;
    }

    public function get_learning(Request $req){
        $learn = Learning::find($req->lid);
        $chart = $learn->reports_chart ?? [];
        $chart = json_decode($chart);

        return $chart;
    }

    public static function routes(){
        Route::prefix('learning')->group(function(){
            Route::get('/put', 'LearningController@put_learning')->name('putlearningchart');
            Route::get('/get', 'LearningController@get_learning')->name('putlearningchart');
        });
        
    }
}
