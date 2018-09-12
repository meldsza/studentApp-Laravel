<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('dashboard/student',['student'=>Auth::user()->student]);
    }
    public function index(Student $student)
    {
        $user = Auth::user();
        if(is_null($user) || !($user->is_teacher || $user->is_admin))
            return redirect('/teacher');
        else
        return view('dashboard/student',['student'=>$student]);

            
    }
}
