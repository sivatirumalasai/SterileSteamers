<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\ServiceCategoryCoupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    public function index()
    {
        $coupons=ServiceCategoryCoupon::where('status',1)->get();
        return view('coupons',["coupons"=>$coupons,'title'=>'Coupons']);
    }
}
