<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marks extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'semister_id','subject_id','task_1','mse_1', 'task_2','mse_2', 'task_3','see'
    ];
    public function semister()
    {
        return $this->belongsTo('App\Semister');
    }
    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
}
