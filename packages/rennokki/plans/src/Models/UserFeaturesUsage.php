<?php

namespace Rennokki\Plans\Models;

use Illuminate\Database\Eloquent\Model;

class UserFeaturesUsage extends Model
{
    protected $table = 'user_features_usage';
    protected $guarded = [];
    protected $casts = [
        'metadata' => 'object',
    ];

    public function user()
    {
        return $this->belongsTo("PlugXR\User", 'id');
    }
    public function scopeCode($query, string $code)
    {
        return $query->where('code', $code);
    }

    public function scopeLimited($query)
    {
        return $query->where('type', 'limit');
    }

    public function scopeFeature($query)
    {
        return $query->where('type', 'feature');
    }

    public function isUnlimited()
    {
        return (bool) ($this->type == 'limit' && $this->limit < 0);
    }
}
