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
        return $this->belongsTo('App\UserOrder');
    }
}
