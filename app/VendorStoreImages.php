<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorStoreImages extends Model
{
    protected $table = "vendor_store_image";
	protected $primary_key = 'id';
	protected $fillable = ['filename','vendor_id','title','description'];
	public $timestamps = true;
}
