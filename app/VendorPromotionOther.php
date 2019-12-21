<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorPromotionOther extends Model
{
    protected $table = 'vendor_other_promotion';
    protected $fillable = ['vendor_id','name','type','expire_date','description','promo_image'];
	public $timestamps = true;
	
	public function vendor()
    {
        return $this->belongsTo(vendor::class,'vendor_id');
    }
}
