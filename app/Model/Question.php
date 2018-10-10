<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['quiztitleid', 'questioneng','questionmm'];

    public function quiztitle()
    {
        return $this->belongsTo('App\Model\Quiztitle');

    }

    public function quiz(){

    	return $this->hasMany('App\Model\Quiz');
    }
}
