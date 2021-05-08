<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
     protected $fillable = [
    	'category_id','title','image','link'
    ];

    public function categories()
    {
       return $this->belongsTo('App\Category','category_id');
    }
}

