<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $guarded=[];
     public function user()
    {
    	return $this->belongsTo(User::class)->where('role',1)->where('status',1);
    }
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
