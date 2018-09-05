<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Semister;

class MarksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the Marks.
     *
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        $marks = Semister::get($id);
        return view('dashboard/marks/view',['user'=>Auth::user(),'marks'=>$marks]);
    }

    public function post(Request $request, $id)
    {
        $sem_marks = Semister::get($id);
        //add stuff
        $sem_marks = Semister::get($id);
        return view('dashboard/marks/view',['user'=>Auth::user(),'marks'=>$marks]);
    }
}
