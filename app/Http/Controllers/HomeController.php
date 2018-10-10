<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Replier\ReplierRepository;
use App\Repositories\Quiztitle\QuiztitleRepository;
use App\Repositories\Question\QuestionRepository;
use App\Repositories\Answer\AnswerRepository;

class HomeController extends Controller
{

    public function __construct(QuiztitleRepository $quiz_title, ReplierRepository $replier,QuestionRepository $question,AnswerRepository $answer){
        $this->middleware('auth');
        $this->quiz_title = $quiz_title;
        $this->replier = $replier;
        $this->question= $question;
        $this->answer = $answer;

    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz_title_data = $this->quiz_title->getAllQuiztitle(); 
        $replier_data = $this->replier->getAllRepliers();
        $question_data = $this->question->getAllQuestion();
        $answer_data = $this->answer->getAllAnswer();

        return view('pages.dashboard.index',compact('quiz_title_data','replier_data','question_data','answer_data'));
    }
}
