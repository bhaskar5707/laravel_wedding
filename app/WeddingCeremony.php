<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\vendor;
class WeddingCeremony extends Model
{
	protected $table = "wedding_website_ceremony";
	protected $primary_key = 'id';
	protected $fillable = ['user_id','title','description','image','our_story_date'];
	public $timestamps = true;

}
