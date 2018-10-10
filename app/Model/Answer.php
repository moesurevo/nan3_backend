<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['questionid', 'answereng','answermm','point'];
    public function question()
    {
        return $this->belongsTo('App\Model\Question','questionid');

    }
}
