<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\vendor;
class AblumPhotoComment extends Model
{
	protected $table = "guest_book_album_comment";
	protected $primary_key = 'id';
	protected $fillable = ['image_id','name','email','comment'];
	public $timestamps = true;

}
