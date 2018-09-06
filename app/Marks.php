<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    public $timestamps = false;
    protected $appends = ['cee','grade'];

    protected $fillable = [
        'semister_id','subject_id','task_1','mse_1', 'task_2','mse_2', 'task_3','see'
    ];
    public function semister()
    {
        return $this->belongsTo('App\Semister');
    }
    public function subject()
    {
        return $this->hasOne('App\Subject','id','subject_id');
    }
    public function getCeeAttribute()
    {
        if($this->is_completed)
            return $this->task_1 + $this->task_2 + $this->task_3 + $this->mse_1 + $this->mse_2;
    }
    public function getGradeAttribute ()
    {
        if($this->is_completed)
            return floor(($this->cee + $this->see)/9.5);
    }
}
