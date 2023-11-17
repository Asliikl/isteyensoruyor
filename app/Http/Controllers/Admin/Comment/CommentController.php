<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use App\Models\Question;
use App\Repositories\CommentRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct(private CommentRepository $commentRepository)
    {
        $this->commentRepository=$commentRepository;
    }

    public function index()
    {
        $comments=$this->commentRepository->index();
        return view('admin.comment.index',['comments'=>$comments]);
    }
    public function commentEdit(Comment $comment)
    {
        $allUsers = User::all();
        $allQuestions = Question::all();
        return view("admin.comment.form", compact('comment', 'allUsers', 'allQuestions'));
    }
    
    public function commentUpdate(Request $request,Comment $comment)
    {
        $data = [
            'content' => $request->get('content'),
            'user_id' => $request->get('user_id'),
            'question_id' => $request->get('question_id'),
        ];
    
        $this->commentRepository->update($data,$comment);
        return redirect(route('comment.index'));
    }

    public function commentDelete(Comment $comment)
    {
        $this->commentRepository->delete($comment);
        return redirect(route('comment.index'));
    }
}
