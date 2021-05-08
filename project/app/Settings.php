<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
    	'logo','watermark_img','favicon','w_title','w_name','w_email','w_address','w_phone','w_time','fb_url','keywords','desc','footer_text','copyright','f_title2', 'f_title3','f_title4','footer_layout','footer_logo','preloader','right_click','inspect','is_gotop','is_preloader','fb_pixel','google_id','is_mailchimp','is_playstore','is_app_icon','app_link','playstore_link','is_category','sidebar_left','google_login','fb_login','gitlab_login','is_blog',
    ];

		public function getFaviconAttribute()
		{
			if (! $this->attributes['favicon']) {
				return 'favicon_def.ico';
			}
			return $this->attributes['favicon'];
		}
		public function getFTitle2Attribute()
		{
			if (! $this->attributes['f_title2']) {
				return 'Widget 2';
			}
			return $this->attributes['f_title2'];
		}
		public function getFTitle3Attribute()
		{
			if (! $this->attributes['f_title3']) {
				return 'Widget 3';
			}
			return $this->attributes['f_title3'];
		}
		public function getFTitle4Attribute()
		{
			if (! $this->attributes['f_title4']) {
				return 'Newsletter Subscribe';
			}
			return $this->attributes['f_title4'];
		}
}
