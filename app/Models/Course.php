<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // protected $guarded = ['_token'];
    // protected $fillable = [
    //     'title',
    //     'slag',
    //     'status', 
    //     'premium_status', 
    //     'user_id'
    // ];

    public function createdBy(){
        return $this->belongsTo('App\User');
    }

    public function managedBy(){
        return $this->belongsTo('App\User', 'manager_user_id');
    }

    public function topics(){
        return $this->hasMany('App\Models\Topic');
    }

    public function assignments(){
        return $this->hasMany('App\Models\Assignment');
    }
}
