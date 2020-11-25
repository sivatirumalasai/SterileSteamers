<?php

namespace Rennokki\Plans\Models;

use Illuminate\Database\Eloquent\Model;

class UserOrders extends Model
{
    protected $table="user_orders";
    protected $guarded=['id'];
    public function plans(){
        return $this->hasManyThrough(config('plans.models.subscription'),config('plans.models.userOrderDetails'),'user_order_id','user_orders_id')->first();
    }
    public  function billingAddress(){
        return $this->hasOne(config('plans.models.billingAddress'),'user_orders_id');
    }
    public function orderDetails(){
        return $this->hasMany(config('plans.models.userOrderDetails'),'user_order_id');
    }
    
}
