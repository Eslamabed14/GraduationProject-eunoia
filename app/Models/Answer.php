<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

   // protected $guarded  = [  ];
    protected $fillable = [
        'weight',
        'answer'

    ];

    public function questions(){
        return $this->belongsToMany(Question::class, 'questions_answers' , 'question_id', 'answer_id');
    }




}
