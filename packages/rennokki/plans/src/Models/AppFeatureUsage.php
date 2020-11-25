<?php

namespace Rennokki\Plans\Models;

use Illuminate\Database\Eloquent\Model;

class AppFeatureUsage extends Model
{
    protected $table = 'app_feature_usage';
    protected $guarded = [];
    protected $casts = [
        'metadata' => 'object',
    ];

    public function app()
    {
        return $this->belongsTo("PlugXR\Collection", 'id');
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
