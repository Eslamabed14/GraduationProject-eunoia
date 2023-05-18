<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $guarded  = [  ];

    public function users(){
        return $this->belongsToMany('App\Models\User', 'users_activities' , 'user_id', 'activity_id');
    }


    public function diseases(){
        return $this->belongsToMany('App\Models\Disease', 'diseases_activities' , 'disease_id', 'activity_id');
    }

}
