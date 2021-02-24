<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperatorService extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function order()
    {
        return $this->belongsTo(UserOrder::class,'user_order_id');
    }
    public function operator()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
