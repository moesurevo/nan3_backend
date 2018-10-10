<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title_no', 'mm_title_no','title','mm_title'];

    public function sub_category()
    {
        return $this->hasMany('App\Model\SubCategory');
    }
}
