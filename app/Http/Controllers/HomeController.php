<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepository;
use App\Repositories\Quiztitle\QuiztitleRepository;

class HomeController extends Controller
{

    public function __construct(QuiztitleRepository $quiz_title, UserRepository $user){
        $this->middleware('auth');
        $this->quiz_title = $quiz_title;
        $this->user = $user;

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
        $quiz_title_data = $this->category->getAllQuiztitle(); 
        $user_data = $this->user->getAllUser();
        return view('pages.dashboard.index',compact('quiz_title_data','user_data'));
    }
}
