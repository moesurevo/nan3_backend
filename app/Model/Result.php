<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
	protected $fillable = ['quizid', 'resulteng','resultmm','pointminimum','pointmaximum'];
    public function quiztitle()
    {
        return $this->belongsTo('App\Model\Quiztitle','quizid');

    }
}
