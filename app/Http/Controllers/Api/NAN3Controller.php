<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\APIBaseController as APIBaseController;
use App\Repositories\Quiztitle\QuiztitleRepository;
use App\Repositories\Question\QuestionRepository;
use App\Repositories\Answer\AnswerRepository;
use App\Repositories\Result\ResultRepository;

class NAN3Controller extends APIBaseController
{
    public function __construct(QuiztitleRepository $quiz_title,QuestionRepository $question,AnswerRepository $answer,ResultRepository $result){
        $this->quiz_title = $quiz_title;
        $this->question = $question;
        $this->answer = $answer;    
        $this->result = $result;    

    }

    public function get_all_records(){
    	$quiz_title = $this->quiz_title->getAllQuiztitle();
    	$question   = $this->question->getAllQuestion();
        $answer     = $this->answer->getAllAnswer();
    	$result     = $this->result->getAllResult();

    	$data = array(
		  	"quiz_title" 	=> $quiz_title->toArray(),
		  	"question" 		=> $question->toArray(),
            "answer"        => $answer->toArray(),
		  	"result"    	=> $result->toArray(),
		);

    	return $this->sendResponse($data, 'All Data retrieved successfully.');
    }
}
