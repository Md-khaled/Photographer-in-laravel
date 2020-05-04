<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $guarded=[];
     public function user()
    {
    	return $this->belongsTo(User::class);
    }
     public function userrating()
    {
    	return $this->belongsTo(User::class,'photographer_id');
    }
     public function photographer()
    {
    	return $this->belongsTo(User::class);
    }
    
}
