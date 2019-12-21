<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\GuestBook;
use App\User;
class GuestInvitation extends Model
{
	protected $table = "guest_invitation";
	protected $primary_key = 'id';
	protected $fillable = ['user_id', 'guest_id', 'bridge_name', 'partner_name', 'wedding_date', 'wedding_place',	'title', 'txt_message', 'address_sent','website', 'rsvp_sent','rsvp_confirm', 'invitation_sent','image'];
	public $timestamps = true;

    public function guest()
    {
    	return $this->belongsTo(GuestBook::class,'guest_id');
    }
    public function user()
    {
    	return $this->belongsTo(User::class,'user_id');
    }
}
