<?php

namespace Rennokki\Plans\Models;

use Illuminate\Database\Eloquent\Model;

class UserSubscriptionLicenses extends Model
{
    protected $table='user_subscription_licenses';
    protected $guarded=['id'];
    public function licenseUsages()
    {
        return $this->hasMany(config('plans.models.licenseUsage'), 'user_subscription_license_id');
    }
    public function licenseFeatures()
    {
        return $this->hasMany(config('plans.models.appLicenseFeatures'), 'license_id','license_id');
    }
}
