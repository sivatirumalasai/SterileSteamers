<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddAccessoryToProduct;
use App\Http\Requests\AddFeatureToProduct;
use App\Http\Requests\AddProductReqeust;
use App\Models\Accessory;
use App\Models\Product;
use App\Models\ProductContains;
use App\Models\ProductFeature;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view("admin.products.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.products.add");
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
            // generate a new filename. getClientOriginalExtension() for the file extension
            $filename = 'product-' . time() . '.' . $file->getClientOriginalExtension();
        
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
        return "edit";
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
        return "update";
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
    public function accessories($id)
    {
        $product=Product::where('code',$id)->first();
        if($product){
            return view('admin.product_accessories.index',['product'=>$product]);
        }
        return redirect()->back();
    }
    public function createAccessories($id)
    {
        $product=Product::where('code',$id)->first();
        if($product){
            return view('admin.product_accessories.add',['product'=>$product]);
        }
        return redirect()->back();
    }
    public function storeAccessories(AddAccessoryToProduct $request, $id)
    {
        dd($request->all());
        $product=Product::where('code',$id)->first();
        if($product){
            ProductContains::updateOrCreate(['accessory_id'=>$request->accessories,'product_id'=>$product->id],['status'=>1,'no_of_items'=>$request->no_of_items]);
        }
        Toastr::success('Product-Accessory Deleted Successfully');
        return redirect()->route('product-accessories',['id'=>$id]);
    }
    public function features($id)
    {
        $product=Product::where('code',$id)->first();
        if($product){
            return view('admin.product_features.index',['product'=>$product]);
        }
        return redirect()->back();
    }
    public function createFeature($id)
    {
        $product=Product::where('code',$id)->first();
        if($product){
            return view('admin.product_features.add',['product'=>$product]);
        }
        return redirect()->back();
    }
    public function storeFeature(AddFeatureToProduct $request, $id)
    {
        $product=Product::where('code',$id)->first();
        if($product){
        
            // save to storage/app/photos as the new $filename
            $path=Storage::disk('public')->put('products', $request->feature_images, 'public');

            ProductFeature::updateOrCreate(['name'=>$request->name,'product_id'=>$product->id],['status'=>1,'image'=>$path,'description'=>$request->description]);
        }
        Toastr::success('Product-Accessory Deleted Successfully');
        return redirect()->route('product-feature',['id'=>$id]);
    }
    public function specifications($id)
    {
        $product=Product::where('code',$id)->first();
        if($product){
            return view('admin.specifications.index',['product'=>$product]);
        }
        return redirect()->back();
    }
    public function createspecifications($id)
    {
        $product=Product::where('code',$id)->first();
        if($product){
            return view('admin.specifications.add',['product'=>$product]);
        }
        return redirect()->back();
    }
}
