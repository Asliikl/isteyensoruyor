<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Question;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comment extends Model
{
    protected $guarded = []; 
    
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function question()
    {
        return $this->hasOne(Question::class,'id','question_id');
    }
    use HasFactory;
}
