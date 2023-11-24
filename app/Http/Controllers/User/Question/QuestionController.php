<?php

namespace App\Http\Controllers\User\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Question;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function questionPost(QuestionRequest $request){
        $newQuestion=Question::create([
            'question'=>$request->get('question'),
            'user_id' => session()->get('user')->id
        ]);
        return redirect(route('user.questionPost'));
    }
}
