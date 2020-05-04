<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	//public $timestamps = false;
    protected $guarded=[];
     public function users()
    {
    	return $this->hasMany(User::class);
    }
     public function photos()
    {
      return $this->hasMany(User::class);
    }
      public function prices()
    {
    	return $this->hasMany(Price::class);
    }
    public function hires()
    {
        return $this->hasMany(Hire::class);
    }
}
