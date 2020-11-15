<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function features()
    {
        return $this->hasMany(ProductFeature::class);
    }
    public function specifications()
    {
        return $this->hasMany(ProductSpecifications::class);
    }
    public function contains()
    {
        return $this->hasMany(ProductContains::class);
    }
    public function notContains()
    {
        return $this->contains()->whereDoesntHave(Accessory::class);
    }
}
