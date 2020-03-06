<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    public function courses(){
        $this->hasMany('App\Models\Course');
    }
}
