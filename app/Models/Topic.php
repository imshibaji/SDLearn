<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
}
