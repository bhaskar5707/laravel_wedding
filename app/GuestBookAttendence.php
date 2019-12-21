<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\GuestBook;
use Illuminate\Support\Facades\Auth;
class GuestBookAttendence extends Model
{
	protected $table = "guest_book_attendence";
	protected $primary_key = 'id';
	protected $fillable = ['name'];
	public $timestamps = false;

    public function guests()
    {
    	return $this->hasMany(GuestBook::class,'attendence_id')->where('user_id',Auth::user()->id)->orWhere('user_id',Auth::user()->partner_id);
    }
}
