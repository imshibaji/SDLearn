<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'lname',
        // 'name',
        'mobile', 
        'email', 
        'password',
        'whatsapp',
        'address',
        'city',
        'pincode',
        'state',
        'country',
        'user_type', 
        'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function reffered(){
        return $this->belongsTo('App\User', 'reffer_by_user_id');
    }

    public function reffers(){
        return $this->hasMany('App\User', 'reffer_by_user_id');
    }

    public function manager(){
        return $this->belongsTo('App\User', 'manage_by_user_id');
    }

    public function manages(){
        return $this->hasMany('App\User', 'manage_by_user_id');
    }

    public function assignments(){
        return $this->hasMany('App\Models\Assignment');
    }

    public function courseAssignments(){
        return $this->hasMany('App\Models\CourseAssignment');
    }

    public function topicAssignments(){
        return $this->hasMany('App\Models\TopicAssignment');
    }

    public function courses(){
        return $this->hasManyThrough('App\Models\Assignment', 'App\Models\Course');
    }

    public function learning(){
        return $this->hasOne('App\Models\Learning');
    }

    public function gems(){
        return $this->hasMany('App\Models\Gem');
    }

    public function money(){
        return $this->hasMany('App\Models\Money');
    }
}
