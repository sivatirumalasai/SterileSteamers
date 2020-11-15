<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function productAccessories()
    {
        return $this->hasMany(ProductContains::class);
    }
}
