<?php 
namespace App\Repositories;

use App\Models\Comment;

class CommentRepository{

   public function index()
   {
     return Comment::all();
   }
   public function update(array $data, Comment $comment)
   {
      $comment->update($data);
      return $comment;
   }
   public function delete(Comment $comment)
   {
      $comment->delete();
   }
}

