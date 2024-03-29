<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAccessoryToProduct;
use App\Http\Requests\AddFeatureToProduct;
use App\Http\Requests\AddProductReqeust;
use App\Http\Requests\AddSpecificationsRequest;
use App\Models\Accessory;
use App\Models\Product;
use App\Models\ProductContains;
use App\Models\ProductFeature;
use App\Models\ProductSpecifications;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
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
        
        return view("admin.products.index",['title'=>'products']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.products.add",['title'=>'products']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddProductReqeust $request)
    {
        $paths=[];
        foreach ($request->product_images as $file) {
            // save to storage/app/photos as the new $filename
            $path=Storage::disk('public')->put('products', $file, 'public');

            $paths[]=$path;
        
        }
        if($request->has('status')){
            $status=true;
        }
        else{
            $status=false;
        }
        Product::create(['name'=>$request->product_name,
        'code'=>$request->code,
        'actual_price'=>$request->price,
        'discount'=>$request->discount,
        'images'=>json_encode($paths),
        'description'=>$request->description,
        'short_description'=>$request->short_description,
        'status'=>$status]);
        Toastr::success('Product Added Successfully');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::where('code',$id)->first();
        if($product){
            return view('admin.products.edit',['product'=>$product,'title'=>'products']);
        }
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
        $paths=[];
        if($request->has('status')){
            $status=true;
        }
        else{
            $status=false;
        }
        $data=[
            'name'=>$request->product_name,
            'code'=>$request->code,
            'actual_price'=>$request->price,
            'discount'=>$request->discount,
            'description'=>$request->description,
            'short_description'=>$request->short_description,
            'status'=>$status
        ];
        if($request->product_images){
            foreach ($request->product_images as $file) {    
                // save to storage/app/photos as the new $filename
                $path=Storage::disk('public')->put('products', $file, 'public');
    
                $paths[]=$path;
            
            }
            
            $data['images']=json_encode($paths);
        }
        Product::where('code',$id)->update($data);
        Toastr::success('Product Updated Successfully');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::where('code',$id)->first();
        if($product){
            $product->features()->delete();
            $product->contains()->delete();
            $product->specifications()->delete();
            $product->delete();
        }
        
        Toastr::success('Product Deleted Successfully');
        return redirect()->route('products.index');
    }
    
    public function createspecifications($id)
    {
        $product=Product::where('code',$id)->first();
        if($product){
            return view('admin.specifications.add',['product'=>$product,'title'=>'products']);
        }
        return redirect()->back();
    }
    public function storeSpecifications(AddSpecificationsRequest $request, $id)
    {
        
        $product=Product::where('code',$id)->first();
        if($product){
            ProductSpecifications::updateOrCreate(['product_id'=>$product->id],[
                "category" => $request->category,
                "info" => $request->info,
                "power" => $request->power,
                "voltage" => $request->voltage,
                "current" => $request->current,
                "heater_count" => $request->heater_count,
                "steam_capacity" => $request->steam_capacity,
                "flow_rate" => $request->flow_rate,
                "approximate" => $request->approximate,
                "operating_pressure" => $request->operating_pressure,
                "maximum_pressure" => $request->maximum_pressure,
                "boiler_vessel_capacity" => $request->boiler_vessel_capacity,
                "boiler_temperature" => $request->boiler_temperature,
                "sprayer_tip_temperature" => $request->sprayer_tip_temperature,
                "steam_temperature_sprayed" => $request->steam_temperature_sprayed,
                "preheating_time" => $request->preheating_time,
                "water_tank_capacity" => $request->water_tank_capacity,
                "fuel_tank_capacity" => $request->fuel_tank_capacity,
                "fuel_consumption" => $request->fuel_consumption,
                "steam_hose_connections" => $request->steam_hose_connections,
                "guns_included" => $request->guns_included,
                "direct_water_connection" =>$request->direct_water_connection,
                "product_weight" => $request->product_weight,
                "product_dimensions" => $request->product_dimensions,
                "freight_dimensions" => $request->freight_dimensions,
                "body_materials" => $request->body_materials,
                "colors_available" => $request->colors_available,
                ]);
        }
        Toastr::success('Product-Specifications added Successfully');
        return redirect()->route('products.index');
    }
}
