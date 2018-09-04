<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semister extends Model
{
    protected $fillable = [
        'sem_name','user_id','is_complete'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function marks()
    {
        return $this->hasMany('App\Marks');
    }
}
