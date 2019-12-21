<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\vendor;
class WeddingBlog extends Model
{
	protected $table = "wedding_website_blog";
	protected $primary_key = 'id';
	protected $fillable = ['user_id','title','description','image'];
	public $timestamps = true;

}
