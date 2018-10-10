<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Question\QuestionRepository;
use App\Repositories\Quiztitle\QuiztitleRepository;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    public function __construct(QuestionRepository $question,QuiztitleRepository $quiz_title){
        $this->middleware('auth');
        $this->question = $question;
        $this->quiz_title = $quiz_title;    

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $question_data = $this->question->getAllQuestion(); 
        return view('pages.question.index',compact('question_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $quiz_title_data = $this->quiz_title->getAllQuiztitle();
        return view('pages.question.new',compact('quiz_title_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {   

        $question_data = $this->question->createQuestion($request->all(),'question');
        return redirect('question')->with('status', 'Question is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = $this->question->findOrThrowException($id);
        return view('pages.question.show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz_title_data = $this->quiz_title->getAllQuiztitle();
        $question = $this->question->findOrThrowException($id);

        return view('pages.question.edit',compact('quiz_title_data','question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id)
    {
        $this->question->update($id, $request->all());
        return redirect()->route('question.index')->with('status','Question has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $quiz_title = $this->category->destroyCategory($id);
        // return redirect()->route('category.index')->with('status','Category has been destroyed');
    }
}
