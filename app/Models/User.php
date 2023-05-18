<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'phone_no',
        'gender',
        'survey_score',
        'description',
        'address',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function activities(){
        return $this->belongsToMany('App\Models\Activity', 'users_activities' , 'user_id', 'activity_id');
    }

    public function surveys(){
        return $this->belongsToMany('App\Models\Survey', 'users_surveys' , 'user_id', 'survey_id');
    }

    public function doctors(){
        return $this->belongsTo('App\Models\Doctor');
    }

    public function diseases(){
        return $this->belongsTo('App\Models\Disease', 'disease_id');
    }

    public function lifestyles(){
        return $this->has('App\Models\Lifestyle');
    }

    public function appointments(){
        return $this->hasMany('App\Models\Appointment');
    }

    public function sentiments(){
        return $this->hasMany(Sentiment::class);
    }
}
