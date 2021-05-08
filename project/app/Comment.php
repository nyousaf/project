<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $fillable = [
		'body','user_id','work_id','status'
	];
  public function users()
  {
    return $this->belongsTo('App\User','user_id');
  }  
  public function works()
  {
    return $this->belongsTo('App\Work','work_id');
  }
}
