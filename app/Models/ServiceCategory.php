<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function plans()
    {
        return $this->hasMany(ServiceCategoryPlan::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }
    
}
