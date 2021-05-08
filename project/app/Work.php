<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\Viewable;
use Auth;

class Work extends Model
{ 
  use Viewable;
  
	protected $fillable = [
		  'model','aperture','iso','focal_len','shutter_speed','dimension','meta_tag','meta_desc','lic_id','category_id','title','desc','slug','uni_id','is_psd','is_featured','status','download','user_id','is_active','width','height','type','model','aperture','iso','focal_len','shutter_speed','taken_date','zip'
	];


	public function workphotos()
	{
	   return $this->hasMany('App\WorkPhoto','work_id');
	}
	public function categories()
	{
	   return $this->belongsTo('App\Category','category_id');
	}
	public function tags()
	{
	   return $this->belongsToMany('App\Tag');
	}	
	public function likes()
  {
		return $this->belongsToMany('App\User','likes','work_id','user_id')->withTimestamps();
  }  
  public function favorites()
  {
		return $this->belongsToMany('App\User','favorites','work_id','user_id')->withTimestamps();
  }
  public function comments()
  {
		return $this->hasMany('App\Comment','work_id');
  }
  public function getIsLikedAttribute()
  {
    $like = $this->likes()->whereUserId(Auth::id())->first();
    return (!is_null($like)) ? '1' : '0';
  }
  public function getIsFavoriteAttribute()
  {
    $favorites = $this->favorites()->whereUserId(Auth::id())->first();
    return (!is_null($favorites)) ? '1' : '0';
  }
  public function users()
  {
		return $this->belongsTo('App\User','user_id');
  }

  public function license(){
    return $this->belongsTo('App\License','lic_id','id');
  }

}
