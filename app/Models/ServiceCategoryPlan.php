<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategoryPlan extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function model()
    {
        return $this->morphTo();
    }
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class,'service_category_id');
    }
    public function coupons()
    {
        return $this->hasMany(ServiceCategoryCoupon::class,'service_category_plan_id');
    }
}
