<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'username','name', 'first_name','last_name','email', 'password','location','country','phone','gender','provider','provider_id','wedding_date', 'wedding_place','partner_id', 'partner_email','partner_verify','profile_img','confirmed','deleted',
        'noofguest','estimate','about','album_url','website','website_template','start_time','end_time','details','status','facebook_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function partner()
    {
        return $this->hasOne(User::class,'partner_id');
    }
    public function guests()
    {
        return $this->hasMany(GuestBook::class, 'user_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class,'location');
    }
}
