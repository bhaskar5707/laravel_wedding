<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorBusinessInfo extends Model
{
    protected $table = 'vendor_business_information';   
	protected $fillable = ['vendor_id','user_name','description','name','email','mobile','telephone','website','alternateemail','gstinaddress','gstno','address','gstinholdername','fax','companyname','companyaddress'];
	public $timestamps = true;
}
