<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['quiztitleid', 'questioneng','questionmm','multiple_select'];

    public function quiztitle()
    {
        return $this->belongsTo('App\Model\Quiztitle','quiztitleid');

    }

    public function answer(){

    	return $this->hasMany('App\Model\Answer');
    }
}
