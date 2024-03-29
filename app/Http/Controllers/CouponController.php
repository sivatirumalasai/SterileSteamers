<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Service;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CouponController extends Controller
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
    public function index()
    {
        return view('admin.coupons.index',['title'=>'coupons']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupons.add',['title'=>'coupons']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // save to storage/app/photos as the new $filename

        $status=false;
        if($request->has('status')){
            $status=true;
        }
        $path=Storage::disk('public')->put('coupons', $request->coupon_image, 'public');
        $Service=Coupon::create([
            'coupon_name'=>$request->coupon_name,
            'coupon_code'=>$request->coupon_code,
            'status'=>$status,
            'image'=>$path,
            'user_type'=>$request->user_type,
            'user_limit'=>$request->user_limit,
            'type'=>$request->coupon_type,
            'amount'=>$request->amount,
            'valid_from'=>$request->valid_from,
            'valid_to'=>$request->valid_to
        ]);
        Toastr::success('Coupon Created Successfully');
        return redirect()->route('coupons.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon=Coupon::find($id);
        if($coupon){
            return view('admin.coupons.edit',['service'=>$coupon,'title'=>'coupons']);
        }
        Toastr::error('Invalid coupon Id');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service=Coupon::where('id',$id)->first();
        if($service){
            // save to storage/app/photos as the new $filename
            $status=false;
            if($request->has('status')){
                $status=true;
            }
            $data=[
                'coupon_name'=>$request->coupon_name,
                'coupon_code'=>$request->coupon_code,
                'status'=>$status,
                'user_type'=>$request->user_type,
                'user_limit'=>$request->user_limit,
                'type'=>$request->coupon_type,
                'amount'=>$request->amount,
                'valid_from'=>$request->valid_from,
                'valid_to'=>$request->valid_to
            ];
            if($request->coupon_image){
                $path=Storage::disk('public')->put('coupons', $request->coupon_image, 'public');
                $data['image']=$path;
            }
            $update=Coupon::where('id',$id)->update($data);
            if($update){
                Toastr::success('coupon Updated Successfully');
                return redirect()->route('coupons.index');
            }
            Toastr::error('Error while update');
            return redirect()->back();
            
        }
        Toastr::error('Invalid coupon Id');
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($service)
    {
        $coupon=Coupon::find($service);
        if($coupon){
            $coupon->delete();

        }
        return redirect()->back();
    }
}
