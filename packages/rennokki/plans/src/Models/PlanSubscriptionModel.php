<?php

namespace Rennokki\Plans\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PlanSubscriptionModel extends Model
{
    protected $table = 'plans_subscriptions';
    protected $guarded = [];
    protected $dates = [
        'starts_on',
        'expires_on',
        'cancelled_on',
    ];
    protected $casts = [
        'is_paid' => 'boolean',
        'is_recurring' => 'boolean',
    ];

    public function model()
    {
        return $this->morphTo();
    }
    public function subscriptionViewsCount(){
        return $this->morphMany('PlugXR\SubscriptionMarkerViews','subscriptionviews');
    }
    public function plan()
    {
        return $this->belongsTo(config('plans.models.plan'), 'plan_id');
    }
    public function appCode()
    {
        return $this->belongsTo(config('plans.models.planCommertialApps'), 'plan_id','plan_id');
    }
    public function subscriptionLicenses(){
        return $this->hasMany(config('plans.models.subscriptionLicenses'),'subscription_id');
    }
    public function nonCommercialLicenses(){
        return $this->hasMany(config('plans.models.subscriptionLicenses'),'subscription_id')->where('license_id', '=', config('plans.planConstants.nonCommertialApp'));
    }
    public function commercialLicenses(){
        return $this->hasMany(config('plans.models.subscriptionLicenses'),'subscription_id')->where('license_id', '<>', config('plans.planConstants.nonCommertialApp'));
    }
    public function subscriptionNonCommercialLicenses()
    {
        return $this->hasManyThrough(config('plans.models.appSubscription'), config('plans.models.subscriptionLicenses'), 'subscription_id', 'subscription_license_id')->notCancelled()->where('app_subscriptions.license_id', '=', config('plans.planConstants.nonCommertialApp'));
    }
     public function subscriptionCommercialLicenses(){
        return $this->hasManyThrough(config('plans.models.appSubscription'),config('plans.models.subscriptionLicenses'),'subscription_id','subscription_license_id')->notCancelled()->where('app_subscriptions.license_id','<>',config('plans.planConstants.nonCommertialApp'));
    }
    public function userCommercialLicenses(){
        return $this->hasMany(config('plans.models.subscriptionLicenses'),'subscription_id')->where('license_id','!=',config('plans.planConstants.nonCommertialApp'));
    }
    public function commertialApps()
    {
        return $this->hasManyThrough(config('plans.models.appLicense'),config('plans.models.planCommertialApps'), 'plan_id','id','plan_id','license_id');
    }
    public function usedCommercialApps(){
        return $this->hasMany(config('plans.models.appSubscription'),'subscription_id');
    }
    public function  orderDetails(){    
        return $this->belongsTo(config('plans.models.userOrderDetails'),'user_orders_id');
    }
    public function commertialAppCode()
    {
        return $this->commertialApps()->first();
    }
    public function features()
    {
        return $this->plan()->first()->features();
    }
    public function addOnOrders(){
        return $this->hasMany(config('plans.models.addOnOrders'),'subscription_id');
    }
    public function usages()
    {
        return $this->hasMany(config('plans.models.usage'), 'subscription_id');
    }
    public function nonRenewableUsages(){
        return $this->hasMany(config('plans.models.userFeaturesUsage'), 'user_id','model_id');
    }
    public function scopePaid($query)
    {
        return $query->where('is_paid', true);
    }

    public function scopeUnpaid($query)
    {
        return $query->where('is_paid', false);
    }

    public function scopeExpired($query)
    {
        return $query->where('expires_on', '<', Carbon::now()->toDateTimeString());
    }
    public function scopeNotExpired($query){
        return $query->where('expires_on','>',Carbon::now()->toDateTimeString());
    }

    public function scopeRecurring($query)
    {
        return $query->where('is_recurring', true);
    }

    public function scopeCancelled($query)
    {
        return $query->whereNotNull('cancelled_on');
    }

    public function scopeNotCancelled($query)
    {
        return $query->whereNull('cancelled_on');
    }

    public function scopeStripe($query)
    {
        return $query->where('payment_method', 'stripe');
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

    public function totalOrderDays() {
        if ($this->hasExpired()) {
            return (int) 0;
        }
        if ($this->user_orders_id!==0)
        {
            $order_details = $this->belongsTo(config('plans.models.userOrders'),'user_orders_id')->first();
            if ($order_details){
                $startdate = new Carbon($order_details->starts_on);
                return (int) $startdate->diffInDays(Carbon::parse($order_details->ends_on));
            }
        }
        $startdate = new Carbon($this->starts_on);
        return (int) $startdate->diffInDays(Carbon::parse($this->expires_on));
    }

    public function orderRemainingDays()
    {
        if ($this->hasExpired()) {
            return (int) 0;
        }
        if ($this->user_orders_id!==0)
        {
            $order_details = $this->belongsTo(config('plans.models.userOrders'),'user_orders_id')->first();
            if ($order_details){
                return (int) Carbon::now()->diffInDays(Carbon::parse($order_details->ends_on));
            }
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
    public function consumeFeature(string $featureCode, float $amount)
    {
        $usageModel = config('plans.models.usage');
        $userUsageModel=config('plans.models.userFeaturesUsage');
        $feature = $this->features()->code($featureCode)->first();
        $feature_data=Features::where('code',$featureCode)->first();
        $usage = $this->usages()->code($featureCode)->first();
        $userUsage = $this->nonRenewableUsages()->code($featureCode)->first();

        if (! $feature_data){
            return false;
        }
        if (! $feature || $feature->type != 'limit') {
            return false;
        }
        if ($feature_data->renewable===0){
            if (! $userUsage) {
                $userUsage = $this->nonRenewableUsages()->save(new $userUsageModel([
                    'code' => $featureCode,
                    'used' => 0,
                ]));
            }

//            if (! $feature->isUnlimited() && $userUsage->used + $amount > $feature->limit) {
//                return false;
//            }

            $remaining = (float) ($feature->isUnlimited()) ? -1 : $feature->limit - ($userUsage->used + $amount);
            event(new \Rennokki\Plans\Events\FeatureConsumed($this, $feature, $amount, $remaining));
            $userUsage->update([
                'used' => (float) ($userUsage->used + $amount),
            ]);
        }
        if (! $usage) {
            $usage = $this->usages()->save(new $usageModel([
                'code' => $featureCode,
                'used' => 0,
            ]));
        }

//        if (! $feature->isUnlimited() && $usage->used + $amount > $feature->limit) {
//            return false;
//        }

        $remaining = (float) ($feature->isUnlimited()) ? -1 : $feature->limit - ($usage->used + $amount);
        event(new \Rennokki\Plans\Events\FeatureConsumed($this, $feature, $amount, $remaining));
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
        $usageModel = config('plans.models.usage');
        $userUsageModel=config('plans.models.userFeaturesUsage');
        $feature = $this->features()->code($featureCode)->first();
        $feature_data=Features::where('code',$featureCode)->first();
        $usage = $this->usages()->code($featureCode)->first();
        $userUsage = $this->nonRenewableUsages()->code($featureCode)->first();

        if (! $feature_data){
            return false;
        }
        if (! $feature || $feature->type != 'limit') {
            return false;
        }
        if ($feature_data->renewable===0){
            if (! $userUsage) {
                $userUsage = $this->nonRenewableUsages()->save(new $userUsageModel([
                    'code' => $featureCode,
                    'used' => 0,
                ]));
            }
            $userUsed = (float)($userUsage->used - $amount < 0) ? 0 : ($userUsage->used - $amount);
            $userUsage->update([
                'used' => $userUsed,
            ]);
        }

        if (! $usage) {
            $usage = $this->usages()->save(new $usageModel([
                'code' => $featureCode,
                'used' => 0,
            ]));
        }

        $used = (float) ($usage->used - $amount < 0) ? 0 : ($usage->used - $amount);
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
    public function getRemainingApps()
    {
//        $commercialUsage = $this->usages()->code('commercial_app')->first();
//        $nonCommercialUsage = $this->usages()->code('non_commercial_app')->first();
//        $addonCommercialUsage = $this->usages()->code('add_on_commercial_app')->first();
        $userCommercialappUsage = $this->nonRenewableUsages()->code('commercial_app')->first();
        $usernonCommercialappUsage = $this->nonRenewableUsages()->code('non_commercial_app')->first();
        $useraddOnCommercialappUsage = $this->nonRenewableUsages()->code('add_on_commercial_app')->first();
        $addOnOrders=$this->addOnOrders()->code("add_on_commercial_app")->first();
        $commercialAppfeature = $this->features()->code('commercial_app')->first();
        $nonCommercialAppfeature = $this->features()->code('non_commercial_app')->first();
        if ($commercialAppfeature){
            $c_limit=$commercialAppfeature->limit;
        }
        else{
            $c_limit=0;
        }
        if ($nonCommercialAppfeature){
            $n_limit=$nonCommercialAppfeature->limit;
        }
        else{
            $n_limit=0;
        }
        if ($addOnOrders){
            $a_limit=$addOnOrders->limit;
        }
        else{
            $a_limit=0;
        }
        if ($userCommercialappUsage){
            $c_used=$userCommercialappUsage->used;
        }
        else{
            $c_used=0;
        }
        if ($usernonCommercialappUsage){
            $n_used=$usernonCommercialappUsage->used;
        }
        else{
            $n_used=0;
        }
        if ($useraddOnCommercialappUsage){
            $a_used=$useraddOnCommercialappUsage->used;
        }
        else{
            $a_used=0;
        }
        return (float)($a_limit+$c_limit+$n_limit)-($a_used+$n_used+$c_used);
    }
    public function getAddOnCommercialAppUsageOf(string $featureCode)
    {
        $usage = $this->usages()->code($featureCode)->first();
        $userUsage = $this->nonRenewableUsages()->code($featureCode)->first();
        $feature_data=Features::where('code',$featureCode)->first();
        if (!$feature_data){
            return;
        }
        if (! $userUsage) {
            return 0;
        }
        return (float) $userUsage->used;
    }
    public function getAddOnCommercialRemainingOf(string $featureCode)
    {
        $usage = $this->usages()->code($featureCode)->first();
        $addOnOrders=$this->addOnOrders()->code($featureCode)->first();
        $feature_data=Features::where('code',$featureCode)->first();
        if (!$feature_data){
            return 0;
        }
        if ($addOnOrders){
            if ($usage){
                return (float) $addOnOrders->limit-$usage->used;
            }
            return (float) $addOnOrders->limit;
        }
        return 0;

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
        $usage = $this->usages()->code($featureCode)->first();
        $addOnOrders=$this->addOnOrders()->code($featureCode)->first();
        $userUsage = $this->nonRenewableUsages()->code($featureCode)->first();
        $feature = $this->features()->code($featureCode)->first();
        $feature_data=Features::where('code',$featureCode)->first();
        if (!$feature_data){
            return 0;
        }
        if (! $feature || $feature->type != 'limit') {
            return 0;
        }
        if ($feature_data->renewable){
            if (! $usage) {
                if (!$addOnOrders){
                    return (float)($feature->isUnlimited()) ? -1 : $feature->limit;
                }
                return (float)($feature->isUnlimited()) ? -1 : $feature->limit+$addOnOrders->limit;
            }
            if (!$addOnOrders){
                return (float)($feature->isUnlimited()) ? -1 : $feature->limit-$usage->used;
            }
            return (float) ($feature->isUnlimited()) ? -1 : (($feature->limit+$addOnOrders->limit) - $usage->used);
        }
        else{
            if (! $userUsage) {
                if (!$addOnOrders){
                    return (float)($feature->isUnlimited()) ? -1 : $feature->limit;
                }
                return (float)($feature->isUnlimited()) ? -1 : $feature->limit+$addOnOrders->limit;

            }
            if (!$addOnOrders){
                return (float)($feature->isUnlimited()) ? -1 : $feature->limit-$userUsage->used;
            }
            return (float) ($feature->isUnlimited()) ? -1 : (($feature->limit+$addOnOrders->limit) - $userUsage->used);
        }
    }
    public function getRemainingOfCommertialApps()
    {
        $featureCode=$this->commertialAppCode();
        if (!$featureCode){
            return 0;
        }
        $usage = $this->usages()->code($featureCode->code)->first();
        $userUsage = $this->nonRenewableUsages()->code($featureCode->code)->first();
        $feature = $this->features()->code('commercial_app')->first();
        $feature_data=Features::where('code',$featureCode->code)->first();
        if (! $feature || $feature->type != 'limit') {
            return 0;
        }
        if ($feature_data->renewable){
            if (! $usage) {
                return (float)($feature->isUnlimited()) ? -1 : $feature->limit;
            }
            return (float) ($feature->isUnlimited()) ? -1 : ($feature->limit - $usage->used);
        }
        else{
            if (! $userUsage) {
                return (float)($feature->isUnlimited()) ? -1 : $feature->limit;
            }
            return (float) ($feature->isUnlimited()) ? -1 : ($feature->limit - $userUsage->used);
        }
    }

}
