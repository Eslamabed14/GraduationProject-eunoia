<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class Doctor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded  = [  ];

    public function users(){
        return $this->hasMany('App\Models\User');
    }

    public function appointments(){
        return $this->hasMany('App\Models\Appointment');
    }
}
