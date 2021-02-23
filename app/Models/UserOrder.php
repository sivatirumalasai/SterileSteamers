<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function orderDetails()
    {
        return $this->hasMany(UserOrderDetail::class)->with('model');
    }
    public function serviceOrders()
    {
        return $this->hasOne(UserOrderDetail::class)->where('model_type','App\Models\ServiceCategoryPlan')->with('model');
    }
    public function orderAddons()
    {
        return $this->hasMany(UserOrderAddOn::class)->with('model');
    }
    public function model()
    {
        return $this->morphTo();
    }
}
