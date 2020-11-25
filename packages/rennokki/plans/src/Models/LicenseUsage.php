<?php

namespace Rennokki\Plans\Models;

use Illuminate\Database\Eloquent\Model;

class LicenseUsage extends Model
{
    protected $table='license_usage';
    protected $guarded=['id'];
    public function scopeCode($query, string $code)
    {
        return $query->where('code', $code);
    }
}
