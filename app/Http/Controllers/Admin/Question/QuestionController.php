<?php
namespace App\Http\Controllers\Admin\Question;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\User;
use App\Repositories\QuestionRepository;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct(private QuestionRepository $questionRepository)
    {
        $this->questionRepository=$questionRepository;
    }

    public function index()
    {
        $questions=$this->questionRepository->index();
        return view('admin.question.index',['questions'=>$questions]);
    }

    public function questionEdit(Question $question)
    {
        $allUsers = User::all(); //select option da kullanmak için tum userlar çekilir
        return view('admin.question.form',compact('question','allUsers'));
    }
    public function questionUpdate(Request $request,Question $question)
    {
        $data = [ 
            'user_id'=>$request->get('user_id'),
            'question'=>$request->get('question')
        ];

        $this->questionRepository->update($data,$question);
        return redirect(route('question.index'));
    }
    public function questionDelete(Question $question)
    {
        $this->questionRepository->delete($question);
        return redirect(route('question.index'));
    }
}
