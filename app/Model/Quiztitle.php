<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Quiztitle extends Model
{
    protected $fillable = ['title_no', 'mm_title_no','titleeng','titlemm'];

    public function question()
    {
        return $this->hasMany('App\Model\Question');
    }
}
