<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $guarded  = [  ];

    public function activities(){
        return $this->belongsToMany('App\Models\Activity', 'diseases_activities' , 'disease_id', 'activity_id');
    }

    public function surveys(){
        return $this->hasMany('App\Models\Survey');
    }

    public function users(){
        return $this->hasMany('App\Models\User');
    }
}
