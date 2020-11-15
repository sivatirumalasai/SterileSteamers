<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAccessoryRequest;
use App\Models\Accessory;
use App\Models\Product;
use App\Models\ProductFeature;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.accessories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.accessories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddAccessoryRequest $request)
    {
        $paths=[];
        foreach ($request->accessory_images as $file) {        
            // save to storage/app/photos as the new $filename
            $path=Storage::disk('public')->put('accessories', $file, 'public');

            $paths[]=$path;
        
        }
        if($request->has('status')){
            $status=true;
        }
        else{
            $status=false;
        }
        Accessory::create(['name'=>$request->accessory_name,
        'code'=>$request->accessory_code,
        'actual_price'=>$request->price,
        'discount'=>$request->discount,
        'category'=>$request->catagories,
        'images'=>json_encode($paths),
        'description'=>$request->description,
        'short_description'=>$request->short_description,
        'weight'=>$request->weight,
        'dimensions'=>$request->dimensions,
        'length'=>$request->length,
        'status'=>$status]);
        Toastr::success('Product Added Successfully');
        return redirect()->back();
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
        $accessory=Accessory::where('code',$id)->first();
        if($accessory){
            $accessory->productAccessories()->delete();
            $accessory->delete();
        }
        Toastr::success('Accessory Deleted Successfully');
        return redirect()->back();
    }
    
}
