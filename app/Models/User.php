<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'district_id','name','mobile','types','gender','role','image', 'email', 'password','address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
     public function district()
    {
        return $this->belongsTo(District::class);
    }
     public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
     public function hires()
    {
        return $this->hasMany(Hire::class);
    }
    public function photographers()
    {
        return $this->hasMany(Hire::class,'photographer_id');
    }
    public function pratings()
    {
        return $this->hasMany(Rating::class,'photographer_id');
    }
     public function chats()
    {
        return $this->hasMany(Rating::class,'from_user_id');
    }
    public function avg()
{
    return $this->pratings()
      ->selectRaw('avg(rating) as rating, photographer_id')
      ->groupBy('photographer_id')
      ->orderBy('rating', 'DESC');
}
     public function prices()
    {
        return $this->hasMany(Price::class);
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
