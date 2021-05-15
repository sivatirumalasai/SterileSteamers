<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCoupons extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    //service_category_coupon_id
    public function couponData()
    {
        return $this->belongsTo(ServiceCategoryCoupon::class,'service_category_coupon_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }
}
