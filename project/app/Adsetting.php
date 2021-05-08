<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adsetting extends Model
{
  protected $fillable = [
  	'Embedd_code','image_flag','catagory_flag','home_flag','search_flag',
  ];
  public $timestamps=false;
}
