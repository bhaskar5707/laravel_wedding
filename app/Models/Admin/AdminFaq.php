<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Category,App\SubCategory;
use App\Models\Admin\AdminFaqAns;
class AdminFaq extends Model
{
    protected $table = 'admin_faq_fields';
    protected $primary_key = 'id';
    protected $fillable = ['admin_id','required','field_name','quantity', 'label','question','category','sub_category','category_id','sub_category_id','status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function faq_answers()
    {
        return $this->hasOne(AdminFaqAns::class,'faq_que_id');
    }
    public function vendors()
    {
        return $this->belongsToMany(vendor::class,'admin_faq_answer','faq_que_id','vendor_id');
    }
}
