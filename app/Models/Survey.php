<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    //protected $guarded  = [  ];

    protected $fillable = [
        'name',
        'survey_type',
        'disease_id'

    ];
    public function users(){
        return $this->belongsToMany(User::class, 'users_surveys' , 'user_id', 'survey_id');
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function diseases(){
        return $this->belongsTo(Disease::class, 'disease_id');
    }
}
