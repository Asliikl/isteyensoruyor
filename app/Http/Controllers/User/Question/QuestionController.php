<?php

namespace App\Http\Controllers\User\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionRequest;
use App\Models\Comment;
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
        return redirect()->route('user.home')->with('success', 'Soru başarıyla gönderildi!');
    }

    public function questionGetAll($questionId)
    {
        $questions = $this->questionRepository->getCommentsByQuestionId($questionId);
        return view('user.comment', ['questions' => $questions]);
    }

    public function answeredQuestions()
    {
        $userId = session('user')->id;

        $comments = Comment::with('question.user')
            ->where('user_id', $userId)
            ->get();

        return view('user.answered_questions', compact('comments'));
    }
    public function myQuestions()
    {
        $userId = session('user')->id;

        $questions = Question::where('user_id', $userId)->get();

        return view('user.my_questions', compact('questions'));
    }


}
