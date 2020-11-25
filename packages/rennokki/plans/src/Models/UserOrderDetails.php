<?php

namespace Rennokki\Plans\Models;

use Illuminate\Database\Eloquent\Model;

class UserOrderDetails extends Model
{
    protected $table="user_order_details";
    protected $guarded=['id'];
    public function addOns(){
        return $this->hasOne(config('plans.models.addOn'),'code','plan_code');
    }
    public function subscription(){
        return $this->hasOne(config('plans.models.plan'),'plan_code','plan_code');
    }
    public function appSubscriptions(){
        return $this->hasMany(config('plans.models.appSubscription'),'subscription_id')->where('subscription','add_on');
    }
}
