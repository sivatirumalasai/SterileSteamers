<?php

namespace Rennokki\Plans\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AppSubscriptionModel extends Model
{
    protected $table='app_subscriptions';
    protected $guarded = [];
    protected $dates = [
        'starts_on',
        'expires_on',
        'cancelled_on',
    ];

    public function model()
    {
        return $this->morphTo();
    }

    public function licence()
    {
        return $this->belongsTo(config('plans.models.appLicense'), 'license_id');
    }
    public function subscriptionViewsCount(){
        return $this->morphMany('PlugXR\SubscriptionMarkerViews','subscriptionviews');
    }
    public function features()
    {
        return $this->licence()->first()->features();
    }
    public function usages()
    {
        return $this->hasMany(config('plans.models.appUsage'), 'app_subscription_id');
    }
    public function licenseUsages()
    {
        return $this->hasMany(config('plans.models.licenseUsage'), 'user_subscription_license_id','subscription_license_id');
    }
    public function nonRenewableUsages(){
        return $this->hasMany(config('plans.models.appFeatureUsage'), 'app_id','model_id');
    }
    public function scopeExpired($query)
    {
        return $query->where('expires_on', '<', Carbon::now()->toDateTimeString());
    }

    public function scopeCancelled($query)
    {
        return $query->whereNotNull('cancelled_on');
    }

    public function scopeNotCancelled($query)
    {
        return $query->whereNull('cancelled_on');
    }

    /**
     * Checks if the current subscription has started.
     *
     * @return bool
     */
    public function hasStarted()
    {
        return (bool) Carbon::now()->greaterThanOrEqualTo(Carbon::parse($this->starts_on));
    }

    /**
     * Checks if the current subscription has expired.
     *
     * @return bool
     */
    public function hasExpired()
    {
        return (bool) Carbon::now()->greaterThan(Carbon::parse($this->expires_on));
    }

    /**
     * Checks if the current subscription is active.
     *
     * @return bool
     */
    public function isActive()
    {
        return (bool) ($this->hasStarted() && ! $this->hasExpired());
    }

    /**
     * Get the remaining days in this subscription.
     *
     * @return int
     */
    public function remainingDays()
    {
        if ($this->hasExpired()) {
            return (int) 0;
        }

        return (int) Carbon::now()->diffInDays(Carbon::parse($this->expires_on));
    }

    /**
     * Checks if the current subscription is cancelled (expiration date is in the past & the subscription is cancelled).
     *
     * @return bool
     */
    public function isCancelled()
    {
        return (bool) $this->cancelled_on != null;
    }

    /**
     * Checks if the current subscription is pending cancellation.
     *
     * @return bool
     */
    public function isPendingCancellation()
    {
        return (bool) ($this->isCancelled() && $this->isActive());
    }

    /**
     * Cancel this subscription.
     *
     * @return self $this
     */
    public function cancel()
    {
        $this->update([
            'cancelled_on' => Carbon::now(),
        ]);

        return $this;
    }

    /**
     * Consume a feature, if it is 'limit' type.
     *
     * @param string $featureCode The feature code. This feature has to be 'limit' type.
     * @param float $amount The amount consumed.
     * @return bool Wether the feature was consumed successfully or not.
     */
    /**
     * Consume a feature, if it is 'limit' type.
     *
     * @param string $featureCode The feature code. This feature has to be 'limit' type.
     * @param float $amount The amount consumed.
     * @return bool Wether the feature was consumed successfully or not.
     */
    public function consumeFeature(string $featureCode, float $amount)
    {
        $licenseUsage = $this->licenseUsages()->code($featureCode)->first();
        $usageModel = config('plans.models.appUsage');
        $licenseUsageModel = config('plans.models.licenseUsage');
        $appUsageModel=config('plans.models.appFeatureUsage');
        $feature = $this->features()->code($featureCode)->first();
        $feature_data=Features::where('code',$featureCode)->first();
        $usage = $this->usages()->code($featureCode)->first();
        $appUsage = $this->nonRenewableUsages()->code($featureCode)->first();

        if (! $feature_data){
            return false;
        }
        if (! $feature || $feature->type != 'limit') {
            return false;
        }
        if ($feature_data->renewable===0){
            if (! $appUsage) {
                $appUsage = $this->nonRenewableUsages()->save(new $appUsageModel([
                    'code' => $featureCode,
                    'used' => 0,
                    'license_id'=>$this->license_id
                ]));
            }
            $appUsage->update([
                'used' => (float) ($appUsage->used + $amount),
            ]);
        }
        if (! $usage) {
            $usage = $this->usages()->save(new $usageModel([
                'code' => $featureCode,
                'used' => 0,
            ]));
        }
        if (! $licenseUsage) {
            $licenseUsage = $this->licenseUsages()->save(new $licenseUsageModel([
                'code' => $featureCode,
                'used' => 0,
            ]));
        }
        $licenseUsage->update(([
            'used' => (float) ($licenseUsage->used + $amount)
        ]));
        return $usage->update([
            'used' => (float) ($usage->used + $amount),
        ]);
    }
    /**
     * Reverse of the consume a feature method, if it is 'limit' type.
     *
     * @param string $featureCode The feature code. This feature has to be 'limit' type.
     * @param float $amount The amount consumed.
     */
    public function unconsumeFeature(string $featureCode, float $amount)
    {
        $usageModel = config('plans.models.appUsage');
        $appUsageModel=config('plans.models.appFeatureUsage');
        $feature = $this->features()->code($featureCode)->first();
        $feature_data=Features::where('code',$featureCode)->first();
        $usage = $this->usages()->code($featureCode)->first();
        $appUsage = $this->nonRenewableUsages()->code($featureCode)->first();

        if (! $feature_data){
            return false;
        }
        if (! $feature || $feature->type != 'limit') {
            return false;
        }
        if ($feature_data->renewable===0){
            if (! $appUsage) {
                $appUsage = $this->nonRenewableUsages()->save(new $appUsageModel([
                    'code' => $featureCode,
                    'used' => 0,
                    'license_id'=>$this->license_id
                ]));
            }
            $appUsed = (float) ($feature->isUnlimited()) ? ($appUsage->used - $amount < 0) ? 0 : ($appUsage->used - $amount) : ($appUsage->used - $amount);
            $remaining = (float) ($feature->isUnlimited()) ? -1 : ($appUsed > 0) ? ($feature->limit - $appUsed) : $feature->limit;
            $appUsage->update([
                'used' => $appUsed,
            ]);
        }

        if (! $usage) {
            $usage = $this->usages()->save(new $usageModel([
                'code' => $featureCode,
                'used' => 0,
            ]));
        }

        $used = (float) ($feature->isUnlimited()) ? ($usage->used - $amount < 0) ? 0 : ($usage->used - $amount) : ($usage->used - $amount);
        $remaining = (float) ($feature->isUnlimited()) ? -1 : ($used > 0) ? ($feature->limit - $used) : $feature->limit;

        event(new \Rennokki\Plans\Events\FeatureUnconsumed($this, $feature, $amount, $remaining));

        return $usage->update([
            'used' => $used,
        ]);
    }

    /**
     * Get the amount used for a limit.
     *
     * @param string $featureCode The feature code. This feature has to be 'limit' type.
     * @return null|float Null if doesn't exist, integer with the usage.
     */
    public function getLicenseUsageOf(string $featureCode)
    {
        $usage = $this->licenseUsages()->code($featureCode)->first();
        $userUsage = $this->nonRenewableUsages()->code($featureCode)->first();
        $feature = $this->features()->code($featureCode)->first();
        $feature_data=Features::where('code',$featureCode)->first();
        if (!$feature_data){
            return;
        }
        if ($feature_data->renewable){
            if (! $feature || $feature->type != 'limit') {
                return;
            }

            if (! $usage) {
                return 0;
            }
            return (float) $usage->used;
        }
        else{
            if (! $feature || $feature->type != 'limit') {
                return;
            }

            if (! $userUsage) {
                return 0;
            }
            return (float) $userUsage->used;
        }
    }
    public function getUsageOf(string $featureCode)
    {
        $usage = $this->usages()->code($featureCode)->first();
        $userUsage = $this->nonRenewableUsages()->code($featureCode)->first();
        $feature = $this->features()->code($featureCode)->first();
        $feature_data=Features::where('code',$featureCode)->first();
        if (!$feature_data){
            return;
        }
        if ($feature_data->renewable){
            if (! $feature || $feature->type != 'limit') {
                return;
            }

            if (! $usage) {
                return 0;
            }
            return (float) $usage->used;
        }
        else{
            if (! $feature || $feature->type != 'limit') {
                return;
            }

            if (! $userUsage) {
                return 0;
            }
            return (float) $userUsage->used;
        }
    }

    /**
     * Get the amount remaining for a feature.
     *
     * @param string $featureCode The feature code. This feature has to be 'limit' type.
     * @return float The amount remaining.
     */
    public function getRemainingOf(string $featureCode)
    {
        $licenseUsage = $this->licenseUsages()->code($featureCode)->first();
        $userUsage = $this->nonRenewableUsages()->code($featureCode)->first();
        $feature = $this->features()->code($featureCode)->first();
        $feature_data=Features::where('code',$featureCode)->first();
        if (!$feature_data){
            return;
        }
        if (! $feature || $feature->type != 'limit') {
            return 0;
        }
        if ($feature_data->renewable){
            if (! $licenseUsage) {
                return (float)($feature->isUnlimited()) ? -1 : $feature->limit;
            }
            return (float) ($feature->isUnlimited()) ? -1 : ($feature->limit - $licenseUsage->used);
        }
        else{
            if (! $userUsage) {
                return (float)($feature->isUnlimited()) ? -1 : $feature->limit;
            }
            return (float) ($feature->isUnlimited()) ? -1 : ($feature->limit - $userUsage->used);
        }
    }
}
