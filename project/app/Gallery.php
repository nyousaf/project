<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
    	'category_id','title','image'
    ];

    public function categories()
    {
       return $this->belongsTo('App\Category','category_id');
    }
}
