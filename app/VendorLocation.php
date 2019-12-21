<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorLocation extends Model
{
    protected $table = 'vendor_location';
    protected $fillable = ['country','state','city','postal_code','vendor_id','address','longitude','Latitude','shopno','landmark','area','location'];
    public $timestamps = true;
}
