<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\vendor;
class WeddingBlogComment extends Model
{
	protected $table = "wedding_website_blog_comment";
	protected $primary_key = 'id';
	protected $fillable = ['blog_id','name','email','title','comment'];
	public $timestamps = true;

}
