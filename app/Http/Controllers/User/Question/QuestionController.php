<?php

namespace App\Http\Controllers\User\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Repositories\QuestionRepository;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct(private QuestionRepository $questionRepository)
    {
        $this->questionRepository=$questionRepository;
    }

    public function questionPost(QuestionRequest $request){
        $newQuestion=Question::create([
            'question'=>$request->get('question'),
            'user_id' => session()->get('user')->id
        ]);
        return redirect(route('user.questionPost'));
    }

    public function questionGetAll($questionId)
    {
        $questions = $this->questionRepository->getCommentsByQuestionId($questionId);
        return view('user.comment', ['questions' => $questions]);
    }   
}
