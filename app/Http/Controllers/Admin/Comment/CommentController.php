<?php
namespace App\Http\Controllers\Admin\Comment;

use App\Http\Controllers\Controller;
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


    public function updateComment()
    {

    }

    public function deleteComment()
    {
        
    }
}
