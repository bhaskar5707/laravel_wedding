<?php

namespace App;

use App\Notifications\VendorResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = true;
    protected $fillable = [
        'name', 'email', 'password','package_id','status','paid','views','clicks','views_phone','price_range','meta_title','meta_keyword','meta_description','meta_canonical'
    ];

    public function businessinfo()
    {
        return $this->hasOne(VendorBusinessInfo::class);
    }
    public function location()
    {
        return $this->hasOne(VendorLocation::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new VendorResetPassword($token));
    }
}
