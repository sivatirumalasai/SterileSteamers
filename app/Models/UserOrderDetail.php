<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrderDetail extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function model()
    {
        return $this->morphTo();
    }
    public function order()
    {
        return $this->belongsTo(UserOrder::class,'user_order_id','id')->where("delivery_status",0)->where('txn_status',1);
    }
}
