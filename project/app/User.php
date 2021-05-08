<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'uni_id', 'password','google_id','facebook_id','suspended','mobile','dob','address','city','country','brief','image','is_admin','is_active','confirmed','website','gender','state','verifyToken','gitlab_id'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function getImageAttribute()
	{
		if (! $this->attributes['image']) {
			return 'user.png';
		}
		return $this->attributes['image'];
	}
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function followers()
	{
		return $this->belongsToMany(User::class, 'followers', 'leader_id', 'follower_id')->withTimestamps();
	}
		
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function followings()
	{
		return $this->belongsToMany(User::class, 'followers', 'follower_id', 'leader_id')->withTimestamps();
	}
	public function user_likes()
  {
    return $this->belongsToMany('App\Work','likes','user_id','work_id')->withTimestamps();
  }  
  public function user_favorites()
  {
    return $this->belongsToMany('App\Work','favorites','user_id','work_id')->withTimestamps();
  }
  public function user_comments()
  {
    return $this->hasMany('App\Comment','user_id');
  }
  public function socials()
  {
    return $this->hasOne('App\UserSocial','user_id');
  }
   public function works()
  {
    return $this->hasMany('App\Work','user_id');
  }
}
