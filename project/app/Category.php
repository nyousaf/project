<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
    	'title', 'slug','image','is_active'
    ];

    public function works()
    {
       return $this->hasMany('App\Work');
    }

}
