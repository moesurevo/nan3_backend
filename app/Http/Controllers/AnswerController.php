<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Question\QuestionRepository;
use App\Repositories\Answer\AnswerRepository;
use App\Http\Requests\AnswerRequest;

class AnswerController extends Controller
{

    public function __construct(QuestionRepository $question,AnswerRepository $answer){
        $this->middleware('auth');
        $this->question = $question;
        $this->answer = $answer;    

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answer_data = $this->answer->getAllAnswer(); 
        return view('pages.answer.index',compact('answer_data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $question_data = $this->question->getAllQuestion();
        return view('pages.answer.new',compact('question_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnswerRequest $request)
    {
        $answer_data = $this->answer->createAnswer($request->all(),'answer');
        return redirect('answer')->with('status', 'Answer is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $answer = $this->answer->findOrThrowException($id);
        return view('pages.answer.show',compact('answer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question_data = $this->question->getAllQuestion();
        $answer = $this->answer->findOrThrowException($id);

        return view('pages.answer.edit',compact('question_data','answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnswerRequest $request, $id)
    {
        $this->answer->update($id, $request->all());
        return redirect()->route('answer.index')->with('status','Answer has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $answer = $this->answer->destroyAnswer($id);
        return redirect()->route('answer.index')->with('status','Answer has been destroyed');
    }
}
