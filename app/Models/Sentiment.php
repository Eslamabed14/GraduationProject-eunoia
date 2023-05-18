<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sentiment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'description',
        'status',
        'user_id',
        'date'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
