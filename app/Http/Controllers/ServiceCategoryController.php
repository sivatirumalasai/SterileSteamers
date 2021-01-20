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
}
