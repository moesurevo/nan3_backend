<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Quiztitle\QuiztitleRepository;
use App\Repositories\Result\ResultRepository;

use App\Http\Requests\ResultRequest;

class ResultController extends Controller
{
    public function __construct(ResultRepository $result,QuiztitleRepository $quiz_title){
        $this->middleware('auth');
        $this->result = $result;
        $this->quiz_title = $quiz_title;    

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result_data = $this->result->getAllResult(); 
        return view('pages.result.index',compact('result_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quiz_title_data = $this->quiz_title->getAllQuiztitle();
        return view('pages.result.new',compact('quiz_title_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResultRequest $request)
    {
        $result_data = $this->result->createResult($request->all(),'result');
        return redirect('result')->with('status', 'Result is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = $this->result->findOrThrowException($id);
        return view('pages.result.show',compact('result'));
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
        $result = $this->result->findOrThrowException($id);

        return view('pages.result.edit',compact('quiz_title_data','result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ResultRequest $request, $id)
    {
        $this->result->update($id, $request->all());
        return redirect()->route('result.index')->with('status','Result has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->result->destroyResult($id);
        return redirect()->route('result.index')->with('status','Result has been destroyed');
    }
}
