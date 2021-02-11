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
        return $this->hasMany(UserOrderDetail::class);
    }
    public function orderAddons()
    {
        return $this->hasMany(UserOrderAddOn::class);
    }
    public function model()
    {
        return $this->morphTo();
    }
}
