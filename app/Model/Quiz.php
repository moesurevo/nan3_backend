<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
	protected $fillable = ['sub_category_id', 'content','mm_content','marks'];
    public function sub_category()
    {
        return $this->belongsTo('App\Model\Subcategory');

    }
}
