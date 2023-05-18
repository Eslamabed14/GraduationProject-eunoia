<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    //protected $guarded  = [  ];
    protected $fillable = [
        'question',
        'survey_id'

    ];
    public function surveys(){
        return $this->belongsTo(Survey::class, 'survey_id');
    }

    public function answers(){
        return $this->belongsToMany(Answer::class, 'questions_answers' , 'question_id', 'answer_id');
    }
}
