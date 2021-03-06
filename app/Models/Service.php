<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function orders()
    {
        return $this->morphMany(UserOrderDetail::class, 'model');
    }
    public function categories()
    {
        return $this->hasMany(ServiceCategory::class);
    }
}
