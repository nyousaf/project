<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportImage extends Model
{
    protected $fillable = [
        'title','desc','user_id','photo_id','status'
    ];
}
