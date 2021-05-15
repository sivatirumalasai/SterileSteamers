<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Models\ServiceCategoryCoupon;
use App\Models\ServiceCategoryPlan;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceCouponsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $services=ServiceCategoryPlan::find($id);
        if($services){
            return view('admin.service-categories-coupons.index',['title'=>'services','service'=>$services]);
        }
        toastr()->error('Invalid Service Id');
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $services=ServiceCategoryPlan::find($id);
        if($services){
            return view('admin.service-categories-coupons.add',['title'=>'services','service'=>$services]);
        }
        toastr()->error('Invalid Service Category Id');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $services=ServiceCategoryPlan::find($id);
        if($services){
            $status=false;
            if($request->has('status')){
                $status=true;
            }
            if($request->coupon_type=='ratio'){
                $paid_services=$request->paid_services;
                $free_services=$request->free_services;
                $discount_amount=0;
            }
            else{
                $paid_services=0;
                $free_services=0;
                $discount_amount=$request->discount;
            }

            $path=Storage::disk('public')->put('services-coupons', $request->coupon_image, 'public');
            ServiceCategoryCoupon::create([
                'service_id'=>$services->category->service_id,
                'service_category_plan_id'=>$id,
                'name'=>$request->name,
                'type'=>$request->coupon_type,
                'amount'=>$request->amount,
                'status'=>$status,
                'image'=>$path,
                'duration'=>$request->duration,
                'discount'=>$discount_amount,
                'no_of_paid_services'=>$paid_services,
                'no_of_free_services'=>$free_services
                ]);
            Toastr::success('Service Coupon Created Successfully');
            return redirect()->route('services.coupons.index',['service'=>$id]);     
        }
        toastr()->error('Invalid Service Id');
        return redirect()->route('services.coupons.index',['service'=>$id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($service,$id)
    {
        
        $category=ServiceCategoryCoupon::find($id);
        if($category){
            return view('admin.service-categories-coupons.edit',['category'=>$category,'title'=>'services']);
        }
        Toastr::error('Invalid Service Category Id');
       return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $service_id, $id)
    {
        $service=ServiceCategoryCoupon::where('id',$id)->first();
        if($service){
            // save to storage/app/photos as the new $filename
            $status=false;
            if($request->has('status')){
                $status=true;
            }
            if($request->coupon_type=='ratio'){
                $paid_services=$request->paid_services;
                $free_services=$request->free_services;
                $discount_amount=0;
            }
            else{
                $paid_services=0;
                $free_services=0;
                $discount_amount=$request->discount;
            }
            $data=[
                'name'=>$request->name,
                'type'=>$request->coupon_type,
                'amount'=>$request->amount,
                'status'=>$status,
                'duration'=>$request->duration,
                'discount'=>$discount_amount,
                'no_of_paid_services'=>$paid_services,
                'no_of_free_services'=>$free_services
            ];
            if($request->coupon_image){
                $path=Storage::disk('public')->put('services', $request->coupon_image, 'public');
                $data['image']=$path;
            }
            $update=ServiceCategoryCoupon::where('id',$id)->update($data);
            if($update){
                Toastr::success('Service Coupon Updated Successfully');
                return redirect()->route('services.coupons.index',['service'=>$service_id]);
            }
            Toastr::error('Error while update');
            return redirect()->back();
            
        }
        Toastr::error('Invalid Service Id');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($service,$category)
    {
        $service_plan=ServiceCategoryCoupon::find($category);
        if($service_plan){  
            $service_plan->delete();
        }
        return redirect()->back();
    }
}
