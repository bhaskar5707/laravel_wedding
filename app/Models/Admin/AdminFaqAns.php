<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\AdminFaq;
use App\vendor;
class AdminFaqAns extends Model
{
    protected $table = 'admin_faq_answer';
	protected $primary_key = 'id';
	protected $fillable = ['faq_que_id','faq_answer','vendor_id','status'];
    
	public function faq_question()
    {
        return $this->belongsTo(AdminFaq::class,'faq_que_id');
    }
    public function vendor()
    {
        return $this->belongsTo(vendor::class);
    }
    
}
