<?php

namespace App\Http\Controllers;

use App\Model\Replier;
use Illuminate\Http\Request;

use App\Repositories\Replier\ReplierRepository;

class ReplierController extends Controller
{
    public function __construct(ReplierRepository $replier){
        $this->middleware('auth');
        $this->replier = $replier;

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $replier_data = $this->replier->getAllRepliers(); 
        return view('pages.replier.index',compact('replier_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Replier  $replier
     * @return \Illuminate\Http\Response
     */
    public function show(Replier $replier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Replier  $replier
     * @return \Illuminate\Http\Response
     */
    public function edit(Replier $replier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Replier  $replier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Replier $replier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Replier  $replier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Replier $replier)
    {
        //
    }
}
