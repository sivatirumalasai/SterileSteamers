<?php


namespace Rennokki\Plans\Models;
use Illuminate\Database\Eloquent\Model;


class AppLicenseUsage extends Model
{
    protected $table = 'app_license_usage';
    protected $guarded = [];
    public function subscription()
    {
        return $this->belongsTo(config('plans.models.appSubscription'), 'id');
    }
    public function scopeCode($query, string $code)
    {
        return $query->where('code', $code);
    }
}