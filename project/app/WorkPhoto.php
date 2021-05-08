<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkPhoto extends Model
{
    protected $fillable = [
    	'work_id','images'
    ];

    public function works()
    {
       return $this->belongsTo('App\Work');
    }
}
