<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'cgpa','credits'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function semisters()
    {
        return $this->hasMany('App\Semister','student_id','id');
    }
}
