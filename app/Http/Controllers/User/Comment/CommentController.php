<?php

namespace App\Http\Controllers\User\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Question;
use App\Models\User;
use App\Http\Requests\CommentRequest;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function __construct(private CommentRepository $commentRepository)
    {
        $this->commentRepository=$commentRepository;
    }
    public function commentGetAll($questionId)
    {
        $comments = $this->commentRepository->getCommentsByQuestionId($questionId);
        return view('user.comment', ['comments' => $comments]);
    }
   
    public function commentForm()
    {
        return view('user.commentForm');
    }

    public function commentPost(CommentRequest $request)
    {
        $new_comment=Comment::create([
            'content'=>$request->get('content'),
            'user_id'=>session()->get('user')->id,
            'question_id'=>$request->get('question_id'),
        ]);
        return redirect(route('user.home'));
    }
  
}
