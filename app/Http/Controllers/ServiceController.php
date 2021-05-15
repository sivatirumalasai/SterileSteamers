<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
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
        $icon=Storage::disk('public')->put('services', $request->service_icon, 'public');
        $Service=Service::create(['name'=>$request->name,'status'=>$status,'icon'=>$icon,'image'=>$path,'description'=>$request->description]);
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
        $service=Service::find($id);
        if($service){
            return view('admin.services.edit',['service'=>$service,'title'=>'services']);
        }
        Toastr::error('Invalid Service Id');
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
        $service=Service::where('id',$id)->first();
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
            $update=Service::where('id',$id)->update($data);
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
    public function destroy($service)
    {
        $service_plan=Service::find($service);
        if($service_plan){            
            foreach($service_plan->categories as $category){
                $category->plans()->delete();
                $category->delete();
            }
            $service_plan->delete();

        }
        return redirect()->back();
    }
}
