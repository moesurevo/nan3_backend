<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
	protected $fillable = ['category_id', 'title','mm_title'];

    public function category()
    {
        return $this->belongsTo('App\Model\Category');

    }

    public function quiz(){

    	return $this->hasMany('App\Model\Quiz');
    }
}
