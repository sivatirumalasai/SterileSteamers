<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $services=Service::find($id);
        if($services){
            return view('admin.service-categories.index',['title'=>'services','service'=>$services]);
        }
        toastr()->error('Invalid Service Id');
        return route('services.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $services=Service::find($id);
        if($services){
            return view('admin.service-categories.add',['title'=>'services','service'=>$services]);
        }
        toastr()->error('Invalid Service Id');
        return route('services.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
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
    public function edit($service,$id)
    {
        $category=ServiceCategory::find($id);
        if($category){
            return view('admin.service-categories.edit',['category'=>$category,'title'=>'services']);
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
    public function update(Request $request, $service, $id)
    {
        $service=ServiceCategory::where('id',$id)->first();
        if($service){
            // save to storage/app/photos as the new $filename
            $status=false;
            if($request->has('status')){
                $status=true;
            }
            $data=[
                'status'=>$status,
                'name'=>$request->name,
                'description'=>$request->description
            ];
            if($request->service_image){
                $path=Storage::disk('public')->put('services', $request->service_image, 'public');
                $data['image']=$path;
            }
            if($request->service_icon){
                $icon=Storage::disk('public')->put('services', $request->service_icon, 'public');
                $data['icon']=$icon;
            }
            $update=ServiceCategory::where('id',$id)->update($data);
            if($update){
                Toastr::success('Service Updated Successfully');
                return redirect()->route('services.index');
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
        $service_plan=ServiceCategory::find($category);
        if($service_plan){  
            $service_plan->plans()->delete();          
            $service_plan->delete();
        }
        return redirect()->back();
    }
}
