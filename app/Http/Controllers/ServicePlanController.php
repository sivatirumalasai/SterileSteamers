<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Models\ServiceCategoryPlan;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicePlanController extends Controller
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
        $category=ServiceCategory::find($id);
        if($category){
            return view('admin.service-category-plans.index',['title'=>'services','category'=>$category]);
        }
        toastr()->error('Invalid Service Id');
        return redirect()->route('services.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $category=ServiceCategory::find($id);
        if($category){
            return view('admin.service-category-plans.add',['title'=>'services','category'=>$category]);
        }
        toastr()->error('Invalid Service Id');
        return redirect()->route('services.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $services=ServiceCategory::find($id);
        if($services){
            $status=false;
            if($request->has('status')){
                $status=true;
            }
            $path=Storage::disk('public')->put('services', $request->service_image, 'public');
            ServiceCategoryPlan::create([
                'service_category_id'=>$id,
                'name'=>$request->name,
                'actual_price'=>$request->actual_price,
                'discount_price'=>$request->discount_price,
                'type'=>$request->type,
                'duration'=>$request->duration,
                'status'=>$status,
                'image'=>$path,
                'description'=>$request->description
                ]);
            Toastr::success('Service Category Plan  Created Successfully');
            return redirect()->route('services.plans.index',['service'=>$id]);        
        }
        toastr()->error('Invalid Service Id');
        return redirect()->route('services.index');
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
    public function edit($service,$plan_id)
    {
        $category=ServiceCategoryPlan::find($plan_id);
        if($category){
            return view('admin.service-category-plans.edit',['category'=>$category,'title'=>'services']);
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
    public function update(Request $request, $service,$id)
    {
        $service=ServiceCategoryPlan::where('id',$id)->first();
        if($service){
            // save to storage/app/photos as the new $filename
            $status=false;
            if($request->has('status')){
                $status=true;
            }
            $data=[
                'name'=>$request->name,
                'actual_price'=>$request->actual_price,
                'discount_price'=>$request->discount_price,
                'type'=>$request->type,
                'duration'=>$request->duration,
                'status'=>$status,
                'description'=>$request->description
            ];
            if($request->service_image){
                $path=Storage::disk('public')->put('services', $request->service_image, 'public');
                $data['image']=$path;
            }
            $update=ServiceCategoryPlan::where('id',$id)->update($data);
            if($update){
                Toastr::success('Service Plan  Updated Successfully');
                return redirect()->route('services.plans.index',['service'=>$service->service_category_id]);   
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
    public function destroy($service,$plan)
    {
        $service_plan=ServiceCategoryPlan::find($plan);
        if($service_plan){
            
            $service_plan->delete();
        }
        return redirect()->back();
    }
}
