<?php

namespace Rennokki\Plans\Traits;

use Carbon\Carbon;
use Rennokki\Plans\Models\PlanSubscriptionModel;
use Rennokki\Plans\Models\UserOrderDetails;
use Rennokki\Plans\Models\UserSubscriptionLicenses;

trait AppPlans
{
    /**
     * Get Subscriptions relatinship.
     *
     * @return morphMany Relatinship.
     */
    public function subscriptions()
    {
       // dd(config('plans.models.appSubscription'));
        return $this->morphMany(config('plans.models.appSubscription'), 'model');
    }

    /**
     * Return the current subscription relatinship.
     *
     * @return morphMany Relatinship.
     */
    public function currentSubscription()
    {
        return $this->subscriptions()
                    ->where('starts_on', '<', Carbon::now())
                    ->where('expires_on', '>', Carbon::now());
    }

    /**
     * Return the current active subscription.
     *
     * @return PlanSubscriptionModel The PlanSubscription model instance.
     */
    public function activeSubscription()
    {
        return $this->currentSubscription()->notCancelled()->first();
    }
    /**
     * Return the Last Exprired subscription.
     *
     * @return PlanSubscriptionModel The PlanSubscription model instance.
     */
    public function lastExpiredSubscription()
    {
        if (! $this->hasSubscriptions()) {
            return;
        }

        if ($this->hasActiveSubscription()) {
            return $this->subscriptions()->latest()->notCancelled()->skip(1)->first();
        }
        return $this->subscriptions()->latest('expires_on')->notCancelled()->first();
    }
    /**
     * Return the current active subscriptions list.
     */
        public function activeSubscriptionsList()
    {
        return $this->subscriptions()
            ->where('expires_on', '>', Carbon::now())->notCancelled()->get();
    }
    /**
     * Return the current active subscriptions list.
     */
    public function futureLastActiveSubscription()
    {
        return $this->subscriptions()
            ->where('expires_on', '>', Carbon::now())->notCancelled()->get();
    }
    /**
     * Get the last active subscription.
     *
     * @return null|PlanSubscriptionModel The PlanSubscription model instance.
     */
    public function lastActiveSubscription()
    {
        if (! $this->hasSubscriptions()) {
            return;
        }

        if ($this->hasActiveSubscription()) {
            return $this->activeSubscription();
        }

        return $this->subscriptions()->latest('starts_on')->notCancelled()->first();
    }

    /**
     * Get the last subscription.
     *
     * @return null|AppSubscriptionModel Either null or the last subscription.
     */
    public function lastSubscription()
    {
        if (! $this->hasSubscriptions()) {
            return;
        }

        if ($this->hasActiveSubscription()) {
            return $this->activeSubscription();
        }

        return $this->subscriptions()->latest('starts_on')->first();
    }
    /**
     * Check if the model has subscriptions.
     *
     * @return bool Wether the binded model has subscriptions or not.
     */
    public function hasSubscriptions()
    {
        return (bool) ($this->subscriptions()->count() > 0);
    }

    /**
     * Check if the model has an active subscription right now.
     *
     * @return bool Wether the binded model has an active subscription or not.
     */
    public function hasActiveSubscription()
    {
        return (bool) $this->activeSubscription();
    }
    /**
     * Subscribe the binded model to a plan. Returns false if it has an active subscription already.
     *
     * @param PlanModel $plan The Plan model instance.
     * @param int $duration The duration, in days, for the subscription.
     * @param bool $isRecurring Whether the subscription should auto renew every $duration days.
     * @return PlanSubscription The PlanSubscription model instance.
     */
    public function subscribeTo($subscription_id,$subscription_type,$license,$subscription_license_id=null)
    {
        $subscriptionModel = config('plans.models.appSubscription');
//        if ($this->hasActiveSubscription()) {
//            $this->cancelAllActiveSubscriptions();
//        }
        if($subscription_type==='subscription'){
            $user_subscription=PlanSubscriptionModel::find($subscription_id);
            $start_date=Carbon::now()->subSeconds(1);
            $expires_on=Carbon::parse($user_subscription->expires_on);
            $subscription_type_id=$subscription_id;
        }
        elseif ($subscription_type==='add_on'){
            $order_details=UserOrderDetails::find($subscription_license_id);
            $start_date=Carbon::parse($order_details->starts_on);
            $expires_on=Carbon::parse($order_details->starts_on)->addDays(30);
            $subscription_type_id=$subscription_license_id;
        }
        if($subscription_license_id===null){
            $subscription_license=UserSubscriptionLicenses::create(['subscription_id'=>$subscription_id,'license_id'=>$license->id]);
        }
        else{
            if ($subscription_type==='add_on'){
                $subscription_license=UserSubscriptionLicenses::create(['subscription_id'=>$subscription_id,'license_id'=>$license->id]);
            }
            else{
                $subscription_license=UserSubscriptionLicenses::find($subscription_license_id);
            }
        }
        $subscription = $this->subscriptions()->save(new $subscriptionModel([
            'subscription_license_id' => $subscription_license->id,
            'subscription_id'=>$subscription_type_id,
            'subscription'=>$subscription_type,
            'license_id'=>$license->id,
            'starts_on' => $start_date,
            'expires_on' => $expires_on,
            'cancelled_on' => null,
        ]));
        return $subscription;
    }
    public function cancelAllActiveSubscriptions(){
        $acivesubscriptioins=$this->activeSubscriptionsList();
        foreach ($acivesubscriptioins as $acivesubscriptioin){
            if ($acivesubscriptioin->isCancelled() || $acivesubscriptioin->isPendingCancellation()) {
            }
            else{
                $acivesubscriptioin->update([
                    'cancelled_on' => Carbon::now()
                ]);
            }
        }
        return $this->activeSubscriptionsList();
    }
    /**
     * Subscribe the binded model to a plan. Returns false if it has an active subscription already.
     *
     * @param PlanModel $plan The Plan model instance.
     * @param DateTme|string $date The date (either DateTime, date or Carbon instance) until the subscription will be extended until.
     * @param bool $isRecurring Wether the subscription should auto renew. The renewal period (in days) is the difference between now and the set date.
     * @return PlanSubscription The PlanSubscription model instance.
     */
    public function subscribeToUntil($user,$subscription_id,$subscription_type,$license, $date, bool $isRecurring = true)
    {
        $subscriptionModel = config('plans.models.appSubscription');

        $date = Carbon::parse($date);

        if ($date->lessThanOrEqualTo(Carbon::now()) || $this->hasActiveSubscription()) {
            return false;
        }

        if ($this->hasDueSubscription()) {
            $this->lastDueSubscription()->delete();
        }

        $subscription = $this->subscriptions()->save(new $subscriptionModel([
             'user_id' => $user->id,
             'subscription_id'=>$subscription_id,
             'subscription'=>$subscription_type,
             'starts_on' => Carbon::now()->subSeconds(1),
             'license_id'=>$license->id,
             'expires_on' => $date,
             'cancelled_on' => null,
        ]));
        return $subscription;
    }

    /**
     * Upgrade the binded model's plan. If it is the same plan, it just extends it.
     *
     * @param PlanModel $newPlan The new Plan model instance.
     * @param int $duration The duration, in days, for the new subscription.
     * @param bool $startFromNow Wether the subscription will start from now, extending the current plan, or a new subscription will be created to extend the current one.
     * @param bool $isRecurring Wether the subscription should auto renew. The renewal period (in days) is the difference between now and the set date.
     * @return PlanSubscription The PlanSubscription model instance with the new plan or the current one, extended.
     */
    public function upgradeCurrentPlanTo($user,$subscription_id,$subscription_type,$license, int $duration = 30, bool $startFromNow = true, bool $isRecurring = true)
    {
        if (! $this->hasActiveSubscription()) {
           return $this->subscribeTo($user,$subscription_id,$subscription_type,$license,$duration,$isRecurring);
        }

        if ($duration < 1) {
            return false;
        }

        $activeSubscription = $this->activeSubscription();
        $activeSubscription->load(['license']);

        $subscription = $this->extendCurrentSubscriptionWith($user,$subscription_id,$subscription_type,$duration, $startFromNow, $isRecurring);
        $oldPlan = $activeSubscription->license;

        if ($subscription->license_id != $license->id) {
            $subscription->update([
                'license_id' => $license->id,
            ]);
        }
        return $subscription;
    }

    /**
     * Upgrade the binded model's plan. If it is the same plan, it just extends it.
     *
     * @param PlanModel $newPlan The new Plan model instance.
     * @param DateTme|string $date The date (either DateTime, date or Carbon instance) until the subscription will be extended until.
     * @param bool $startFromNow Wether the subscription will start from now, extending the current plan, or a new subscription will be created to extend the current one.
     * @param bool $isRecurring Wether the subscription should auto renew. The renewal period (in days) is the difference between now and the set date.
     * @return PlanSubscription The PlanSubscription model instance with the new plan or the current one, extended.
     */
    public function upgradeCurrentPlanToUntil($user,$subscription_id,$subscription_type,$license,$date, bool $startFromNow = true, bool $isRecurring = true)
    {
        if (! $this->hasActiveSubscription()) {
            return $this->subscribeToUntil($user,$subscription_id,$subscription_type,$license, $date,$isRecurring);
        }

        $activeSubscription = $this->activeSubscription();
        $activeSubscription->load(['license']);

        $subscription = $this->extendCurrentSubscriptionUntil($order,$date, $startFromNow, $isRecurring);
        $oldPlan = $activeSubscription->license;

        $date = Carbon::parse($date);

        if ($startFromNow) {
            if ($date->lessThanOrEqualTo(Carbon::now())) {
                return false;
            }
        }

        if (Carbon::parse($subscription->expires_on)->greaterThan($date)) {
            return false;
        }

        if ($subscription->plan_id != $newPlan->id) {
            $subscription->update([
                'license_id' => $license->id,
            ]);
        }
        return $subscription;
    }

    /**
     * Extend the current subscription with an amount of days.
     *
     * @param int $duration The duration, in days, for the extension.
     * @param bool $startFromNow Wether the subscription will be extended from now, extending to the current plan, or a new subscription will be created to extend the current one.
     * @param bool $isRecurring Wether the subscription should auto renew. The renewal period (in days) equivalent with $duration.
     * @return PlanSubscription The PlanSubscription model instance of the extended subscription.
     */
    public function extendCurrentSubscriptionWith($user,$subscription_id,$subscription_type,int $duration = 30, bool $startFromNow = true, bool $isRecurring = true)
    {
        if (! $this->hasActiveSubscription()) {
            if ($this->hasSubscriptions()) {
                $lastActiveSubscription = $this->lastActiveSubscription();
                $lastActiveSubscription->load(['license']);
                return $this->subscribeTo($user,$subscription_id,$subscription_type,$lastActiveSubscription->license, $duration, $isRecurring);
            }
            return $this->subscribeTo($user,$subscription_id,$subscription_type,config('plans.models.appLicense')::find(config('plans.planConstants.freePlan')), $duration, $isRecurring);
        }

        if ($duration < 1) {
            return false;
        }

        $activeSubscription = $this->activeSubscription();

        if ($startFromNow) {
            $activeSubscription->update([
                'expires_on' => Carbon::parse($activeSubscription->expires_on)->addDays($duration),
            ]);
            return $activeSubscription;
        }

        $subscriptionModel = config('plans.models.appSubscription');

        $subscription = $this->subscriptions()->save(new $subscriptionModel([
            'user_id' => $user->id,
            'subscription_id'=>$subscription_id,
            'subscription'=>$subscription_type,
            'starts_on' => Carbon::parse($activeSubscription->expires_on),
            'license_id'=>$activeSubscription->license_id,
            'expires_on' => Carbon::parse($activeSubscription->expires_on)->addDays($duration),
            'cancelled_on' => null,
        ]));
        return $subscription;
    }

    /**
     * Extend the subscription until a certain date.
     *
     * @param DateTme|string $date The date (either DateTime, date or Carbon instance) until the subscription will be extended until.
     * @param bool $startFromNow Wether the subscription will be extended from now, extending to the current plan, or a new subscription will be created to extend the current one.
     * @param bool $isRecurring Wether the subscription should auto renew. The renewal period (in days) is the difference between now and the set date.
     * @return PlanSubscription The PlanSubscription model instance of the extended subscription.
     */
    public function extendCurrentSubscriptionUntil($user,$subscription_id,$subscription_type,$date, bool $startFromNow = true, bool $isRecurring = true)
    {
        if (! $this->hasActiveSubscription()) {
            if ($this->hasSubscriptions()) {
                $lastActiveSubscription = $this->lastActiveSubscription();
                $lastActiveSubscription->load(['license']);

                return $this->subscribeToUntil($user,$subscription_id,$subscription_type,$lastActiveSubscription->license_id, $date, $isRecurring);
            }

            return $this->subscribeToUntil($user,$subscription_id,$subscription_type,config('plans.models.appLicense')::find(config('plans.planConstants.freePlan')), $date, $isRecurring);
        }

        $date = Carbon::parse($date);
        $activeSubscription = $this->activeSubscription();

        if ($startFromNow) {
            if ($date->lessThanOrEqualTo(Carbon::now())) {
                return false;
            }

            $activeSubscription->update([
                'expires_on' => $date,
            ]);
            return $activeSubscription;
        }

        if (Carbon::parse($activeSubscription->expires_on)->greaterThan($date)) {
            return false;
        }

        $subscriptionModel = config('plans.models.appSubscription');

        $subscription = $this->subscriptions()->save(new $subscriptionModel([
            'user_id' => $user->id,
            'subscription_id'=>$subscription_id,
            'subscription'=>$subscription_type,
            'starts_on' => Carbon::parse($activeSubscription->expires_on),
            'license_id'=>$activeSubscription->license_id,
            'expires_on' => $date,
            'cancelled_on' => null
        ]));


        return $subscription;
    }

    /**
     * Cancel the current subscription.
     *
     * @return bool Wether the subscription was cancelled or not.
     */
    public function cancelCurrentSubscription()
    {
        if (! $this->hasActiveSubscription()) {
            return false;
        }

        $activeSubscription = $this->activeSubscription();

        if ($activeSubscription->isCancelled() || $activeSubscription->isPendingCancellation()) {
            return false;
        }

        $activeSubscription->update([
            'cancelled_on' => Carbon::now()
        ]);
        return $activeSubscription;
    }

    /**
     * Renew the subscription, if needed, and create a new charge
     * if the last active subscription was using Stripe and was paid.
     *
     * @param string $stripeToken The stripe Token for integrated Stripe Charge feature.
     * @return false|PlanSubscriptionModel
     */
    public function renewSubscription($user,$subscription_id,$subscription_type,$stripeToken = null)
    {
        if (! $this->hasSubscriptions()) {
            return false;
        }

        if ($this->hasActiveSubscription()) {
            return false;
        }
        $lastActiveSubscription = $this->lastActiveSubscription();

        if (! $lastActiveSubscription) {
            return false;
        }

        if (! $lastActiveSubscription->is_recurring || $lastActiveSubscription->isCancelled()) {
            return false;
        }

        $lastActiveSubscription->load(['license']);
        $license = $lastActiveSubscription->license;
        $recurringEachDays = $lastActiveSubscription->recurring_each_days;

        return $this->subscribeTo($user,$subscription_id,$subscription_type,$license,$order, $recurringEachDays);
    }
}
