<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrderAddOn extends Model
{
    use HasFactory;
    protected $guarded=[];
    
    public function order()
    {
        return $this->belongsTo('App\UserOrder');
    }

    public function model()
    {
        return $this->morphTo();
    }
}
