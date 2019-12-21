<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class GuestBookMenu extends Model
{
	protected $table = 'guest_book_menu';
	protected $fillable = ['name','description','user_id'];
	public $timestamps = false;

	public function guests()
    {
    	return $this->hasMany(GuestBook::class,'menu_id')->where('user_id',Auth::user()->id)->orWhere('user_id',Auth::user()->partner_id);
    }

}
