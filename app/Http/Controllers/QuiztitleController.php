<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Quiztitle\QuiztitleRepository;
use App\Http\Requests\QuiztitleRequest;

class QuiztitleController extends Controller
{
    public function __construct(QuiztitleRepository $quiz_title){
        $this->middleware('auth');
        $this->quiz_title = $quiz_title;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quiz_title_data = $this->quiz_title->getAllQuiztitle(); 
        return view('pages.quiz_title.index',compact('quiz_title_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('pages.quiz_title.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuiztitleRequest $request)
    {   

        $quiz_title = $this->quiz_title->createQuiztitle($request->all(),'quiz_title');
        return redirect('quiz_title')->with('status', 'Quiz title is successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz_title = $this->quiz_title->findOrThrowException($id);
        return view('pages.quiz_title.show',compact('quiz_title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz_title = $this->quiz_title->findOrThrowException($id);

        return view('pages.quiz_title.edit',compact('quiz_title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuiztitleRequest $request, $id)
    {
        $this->quiz_title->update($id, $request->all());
        return redirect()->route('quiz_title.index')->with('status','Quiz title has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        die();
        // $quiztitle = $this->quiztitle->destroyQuiztitle($id);
        // return redirect()->route('quiz_title.index')->with('status','Quiz title has been destroyed');
    }
}
