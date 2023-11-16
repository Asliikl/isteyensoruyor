<?php 
namespace App\Repositories;

use App\Models\Comment;

class CommentRepository{

   public function index()
   {
     return Comment::all();
   }
}