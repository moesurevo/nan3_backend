<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Subcategory\SubcategoryRepository;
use App\Repositories\Quiz\QuizRepository;
use App\Http\Requests\QuizRequest;

class QuizController extends Controller
{

    public function __construct(SubcategoryRepository $sub_category,QuizRepository $quiz){
        $this->middleware('auth');
        $this->sub_category = $sub_category;
        $this->quiz = $quiz;    

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz_data = $this->quiz->getAllQuiz(); 
        return view('pages.quiz.index',compact('quiz_data'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sub_category_data = $this->sub_category->getAllSubcategory();
        return view('pages.quiz.new',compact('sub_category_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizRequest $request)
    {
        $quiz_data = $this->quiz->createQuiz($request->all(),'quiz');
        return redirect('quiz')->with('status', 'Quiz is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = $this->quiz->findOrThrowException($id);
        return view('pages.quiz.show',compact('quiz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_category_data = $this->sub_category->getAllSubcategory();
        $quiz = $this->quiz->findOrThrowException($id);

        return view('pages.quiz.edit',compact('sub_category_data','quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizRequest $request, $id)
    {
        $this->quiz->update($id, $request->all());
        return redirect()->route('quiz.index')->with('status','Quiz has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
