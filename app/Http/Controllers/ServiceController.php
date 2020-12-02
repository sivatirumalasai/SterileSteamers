<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceCategoryPlan;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.services.index',['title'=>'services']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.add',['title'=>'services']);
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
        $path=Storage::disk('public')->put('services', $request->service_image, 'public');
        Service::create(['name'=>$request->name,'status'=>$status,'image'=>$path,'description'=>$request->description]);
        Toastr::success('Service Created Successfully');
        return redirect()->route('services.create');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function categories($id)
    {
        $services=Service::find($id);
        if($services){
            return view('admin.service-categories.index',['title'=>'services','service'=>$services]);
        }
        toastr()->error('Invalid Service Id');
        return route('services.index');
    }
    public function categoryCreate($id)
    {
        $services=Service::find($id);
        if($services){
            return view('admin.service-categories.add',['title'=>'services','service'=>$services]);
        }
        toastr()->error('Invalid Service Id');
        return route('services.index');
    }
    public function categoryStore(Request $request,$id)
    {
        $services=Service::find($id);
        if($services){
            $status=false;
            if($request->has('status')){
                $status=true;
            }
            $path=Storage::disk('public')->put('services', $request->service_image, 'public');
            ServiceCategory::create(['service_id'=>$id,'name'=>$request->name,'status'=>$status,'image'=>$path,'description'=>$request->description]);
            Toastr::success('Service Created Successfully');
            return redirect()->route('services.create');        
        }
        toastr()->error('Invalid Service Id');
        return route('services.index');
        
    }
    public function plans($id)
    {
        $category=ServiceCategory::find($id);
        if($category){
            return view('admin.service-category-plans.index',['title'=>'services','category'=>$category]);
        }
        toastr()->error('Invalid Service Id');
        return route('services.index');
    }
    public function planCreate($id)
    {
        $category=ServiceCategory::find($id);
        if($category){
            return view('admin.service-category-plans.add',['title'=>'services','category'=>$category]);
        }
        toastr()->error('Invalid Service Id');
        return route('services.index');
    }
    public function planStore(Request $request,$id)
    {
        $services=Service::find($id);
        if($services){
            $status=false;
            if($request->has('status')){
                $status=true;
            }
            $path=Storage::disk('public')->put('services', $request->service_image, 'public');
            ServiceCategoryPlan::create(['service_id'=>$id,'name'=>$request->name,'status'=>$status,'image'=>$path,'description'=>$request->description]);
            Toastr::success('Service Created Successfully');
            return redirect()->route('service-plans.create',['id'=>$id]);        
        }
        toastr()->error('Invalid Service Id');
        return route('services.index');
        
    }
}
