<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Rap2hpoutre\FastExcel\FastExcel;
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
        $student = $sem->student;
        if(!$user->is_teacher && !$user->is_admin)
            if(!$user->student || $user->student->id != $student->id)
                return abort(404);
        $editable = ($user->is_teacher || $user->is_admin);
        
        return view('marks',['user'=>Auth::user(),'student'=>$student,'sem'=>$sem->load('marks.subject'),'editable'=>$editable]);
    }

    public function edit(Request $request, Semister $sem)
    {
        $user = Auth::user();
        $student = $sem->student;
        if(!$user->is_teacher && !$user->is_admin)
            return abort(404);
        return view('marks',['user'=>Auth::user(),'student'=>$student,'sem'=>$sem->load('marks.subject'),'editable'=>true]);
    }
    public function post(Request $request, Semister $sem)
    {
        $user = Auth::user();
        $student = $sem->student;
        if(!$user->is_teacher && !$user->is_admin)
            return abort(404);
        return view('marks',['user'=>Auth::user(),'student'=>$student,'sem'=>$sem->load('marks.subject'),'editable'=>true]);
    }
    public function download(Request $request, Semister $sem)
    {
        $user = Auth::user();
        $student = $sem->student;
        if(!$user->is_teacher && !$user->is_admin)
            if(!$user->student || $user->student->id != $student->id)
                return abort(404);
        //return (new FastExcel($sem->load('marks.subject')->toArray()))->download('marks.xls');
        return (new FastExcel($sem->marks->map(function ($submark) {
            $sma = $submark->toArray();
            return [
                'Subject' => $submark->subject->name,
                'Task 1' => $submark->task_1,
                'MSE 1' => $submark->mse_1,
                'Task 2' => $submark->task_2,
                'MSE 2' => $submark->mse_2,
                'Task 3' => $submark->task_3,
                'CEE' => $sma['cee'],
                'SEE' => $sma['see'],
                'Grade' => $sma['grade']
            ];    
        })))->download('marks.xlsx');
    }
}
