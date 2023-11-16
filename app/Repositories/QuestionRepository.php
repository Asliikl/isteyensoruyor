<?php 
namespace App\Repositories;

use App\Models\Question;

class QuestionRepository{

    public function index(){
        return Question::all();
    }
    public function update(array $data,Question $question){
        $question->update($data);
        return $question;
    }
    public function delete(Question $question){
        $question->delete();
    }
}