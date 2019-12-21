<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name','slug','state_id'];
    protected $table = "cities";
    public $timestamps = false;
     
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    // country relation

}
