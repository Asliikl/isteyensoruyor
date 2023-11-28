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
    
    public function commentPost(CommentRequest $request, $questionId)
    {
        $new_comment = Comment::create([
            'content' => $request->input('content'),
            'user_id' => session()->get('user')->id,
            'question_id' => $questionId,
        ]);
    
        return redirect(route('user.questionGetAll', ['questionId' => $questionId]));
    }
    

}
