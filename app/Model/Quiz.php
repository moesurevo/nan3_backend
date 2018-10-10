<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
	protected $fillable = ['questionid', 'answereng','answermm','answereng'];
    public function question()
    {
        return $this->belongsTo('App\Model\Question');

    }
}
