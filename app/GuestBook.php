<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\GuestBookGroup;
use App\GuestBookMenu;
use App\GuestBookAttendence;
use App\User;
use App\Country,App\State,App\City;
class GuestBook extends Model
{
    protected $table = 'guest_books';
    protected $fillable = ['user_id','firstname','lastname','attendence_id','group_id','menu_id','gender','age','companions','email','telephone','mobile','address','city_id','state_id', 'country_id','postalcode','invitation','image','relation','facebook_link','instagram_link','twitter_link','otp','active'];

    public function albums()
    {
        return $this->hasMany(GuestBookAlbum::class,'guest_id');
    }
    public function group()
    {
        return $this->belongsTo(GuestBookGroup::class,'group_id');
    }
    public function menu()
    {
        return $this->belongsTo(GuestBookMenu::class,'menu_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function attendence()
    {
        return $this->belongsTo(GuestBookAttendence::class,'attendence_id');
    }

}
