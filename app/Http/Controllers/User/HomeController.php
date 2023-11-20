<?php

namespace App\Http\Controllers\User;

use App\Repositories\QuestionRepository;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct(private QuestionRepository $questionRepository)
    {
        $this->questionRepository=$questionRepository;
    }

    public function home(Request $request){
        $questions=$this->questionRepository->index();
        return view('user.home', ['questions' => $questions]);
    }
}
