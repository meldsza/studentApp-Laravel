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
    public function get(Semister $sem)
    {
        $user = Auth::user();
        $editable = ($user->is_teacher || $user->is_admin);
        return view('marks',['user'=>Auth::user(),'sem'=>$sem->load('marks.subject'),'editable'=>$editable]);
    }

    public function post(Request $request, Semister $marks)
    {
        $request->input('');
        $user = Auth::user();
        if(!$user->is_teacher && !$user->is_admin) return error(404);
        return view('marks',['user'=>Auth::user(),'sem'=>$sem->load('marks.subject'),'editable'=>true]);
    }
}
