<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\GuestBook;
use Illuminate\Support\Facades\Auth;
class GuestBookGroup extends Model
{
	protected $table = "guest_book_group";
	protected $primary_key = 'id';
	protected $fillable = ['name','user_id'];
	public $timestamps = false;

	public function guests()
    {
    	return $this->hasMany(GuestBook::class,'group_id')->where('user_id',Auth::user()->id)->orWhere('user_id',Auth::user()->partner_id);
    }
}
