<?php

namespace Rennokki\Plans\Models;

use Illuminate\Database\Eloquent\Model;

class AddOnOrders extends Model
{
    protected $table="add_on_orders";
    protected $guarded=['id'];
    public function addOnDeatils()
    {
        return $this->belongsTo(config('plans.models.addOn'), 'add_on_id');
    }
    public function subscription(){
        return $this->belongsTo(config('plans.models.subscription'),'subscription_id');
    }
    public function scopeCode($query, string $code)
    {
        return $query->where('code', $code);
    }
}
