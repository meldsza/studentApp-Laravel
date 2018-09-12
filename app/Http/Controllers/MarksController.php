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
        $student = $sem->student;
        return view('marks',['user'=>Auth::user(),'student'=>$student,'sem'=>$sem->load('marks.subject'),'editable'=>$editable]);
    }

    public function post(Request $request, Semister $marks)
    {
        $request->input('');
        $user = Auth::user();
        $student = $sem->student;
        if(!$user->is_teacher && !$user->is_admin)
            return abort(404);
        return view('marks',['user'=>Auth::user(),'student'=>$student,'sem'=>$sem->load('marks.subject'),'editable'=>true]);
    }
}
