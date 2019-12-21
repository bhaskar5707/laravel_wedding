<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\GuestBookGroup;
use App\GuestBookMenu;
use App\GuestBookAttendence;
use App\Country,App\State,App\City,App\User;
use Illuminate\Support\Facades\Auth;
class GuestBookAlbum extends Model
{
    protected $table = "guest_book_album";
    protected $primary_key = 'id';
    protected $fillable = ['filename','user_id','guest_id','title','description'];
    public $timestamps = true;

    public function guest()
    {
    	return $this->belongsTo(GuestBook::class,'guest_id')->where('user_id',Auth::user()->id)->orWhere('user_id',Auth::user()->partner_id);
    }
    
    public function comments()
    {
    	return $this->hasMany(AblumPhotoComment::class,'image_id','id');
    }
 
}
