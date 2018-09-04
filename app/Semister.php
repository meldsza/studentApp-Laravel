<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semister extends Model
{
    protected $fillable = [
        'sem_name','student_id','subject_id','is_complete','sgpa'
    ];
    public function user()
    {
        return $this->belongsTo('App\Student');
    }
    public function marks()
    {
        return $this->hasMany('App\Marks');
    }
}
