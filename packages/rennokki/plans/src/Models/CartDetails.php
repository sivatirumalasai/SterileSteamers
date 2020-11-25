<?php

namespace Rennokki\Plans\Models;

use Illuminate\Database\Eloquent\Model;

class CartDetails extends Model
{
    protected $guarded=['id'];
    public function model()
    {
        return $this->morphTo();
    }
    public function scopeCode($query, string $code)
    {
        return $query->where('code', $code);
    }
}
