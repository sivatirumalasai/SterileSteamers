<?php

return [

    /*
     * The model which handles the plans tables.
     */

    'models' => [
        'plan' => \Rennokki\Plans\Models\PlanModel::class,
        'subscription' => \Rennokki\Plans\Models\PlanSubscriptionModel::class,
        'feature' => \Rennokki\Plans\Models\PlanFeatureModel::class,
        'usage' => \Rennokki\Plans\Models\PlanSubscriptionUsageModel::class,
        'userFeaturesUsage'=>\Rennokki\Plans\Models\UserFeaturesUsage::class,
        'appFeatureUsage'=>\Rennokki\Plans\Models\AppFeatureUsage::class,
        'planCommertialApps'=>\Rennokki\Plans\Models\PlanCommertialApps::class,
        'features'=> \Rennokki\Plans\Models\Features::class,
        'stripeCustomer' => \Rennokki\Plans\Models\StripeCustomerModel::class,
        'appLicense'=>\Rennokki\Plans\Models\AppLicense::class,
        'appSubscription'=>\Rennokki\Plans\Models\AppSubscriptionModel::class,
        'appUsage'=>\Rennokki\Plans\Models\AppLicenseUsage::class,
        'appLicenseFeatures'=>\Rennokki\Plans\Models\AppLicenseFeature::class,
        'userOrders'=>\Rennokki\Plans\Models\UserOrders::class,
        'userOrderDetails'=>\Rennokki\Plans\Models\UserOrderDetails::class,
        'billingAddress'=>\Rennokki\Plans\Models\BillingAddress::class,
        'cartDetails'=>\Rennokki\Plans\Models\CartDetails::class,
        'subscriptionLicenses'=>\Rennokki\Plans\Models\UserSubscriptionLicenses::class,
        'licenseUsage'=>\Rennokki\Plans\Models\LicenseUsage::class,
        'addOn'=>\Rennokki\Plans\Models\AddOns::class,
        'addOnOrders'=>\Rennokki\Plans\Models\AddOnOrders::class
    ],
    'planConstants'=>[
        'freePlan'=>7,
        'non_commertial_app'=>7
    ]
];
