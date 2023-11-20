<?php

namespace App\Http\Controllers\User\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
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

   public function commentGetAll()
   {
        $comments=$this->commentRepository->index();
        return view('user.comment',['comments'=>$comments]);
   }
}
