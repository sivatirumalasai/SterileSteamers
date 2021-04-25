<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductFeature;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductFeatureController extends Controller
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
    public function index($product)
    {
        $product=Product::where('code',$product)->first();
        if($product){
            return view('admin.product_features.index',['product'=>$product,'title'=>'products']);
        }
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product=Product::where('code',$id)->first();
        if($product){
            return view('admin.product_features.add',['product'=>$product,'title'=>'products']);
        }
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
        $product=Product::where('code',$id)->first();
        if($product){
            // save to storage/app/photos as the new $filename
            $path=Storage::disk('public')->put('products', $request->feature_images, 'public');
            ProductFeature::updateOrCreate(['name'=>$request->name,'product_id'=>$product->id],['status'=>1,'image'=>$path,'description'=>$request->description]);
        }
        Toastr::success('Product-Accessory Added Successfully');
        return redirect()->route('products.features.create',['product'=>$id]);
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
    public function edit($product_id,$id)
    {
        $product=Product::where('code',$product_id)->first();
        if($product){
            $product_feature=$product->features()->where('id',$id)->first();
            return view('admin.product_features.edit',['product'=>$product,'feature'=>$product_feature,'title'=>'products']);
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
    public function update(Request $request,$product_id, $id)
    {
        $product=Product::where('code',$product_id)->first();
        if($product){
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
            if($request->feature_images){
                $path=Storage::disk('public')->put('products', $request->feature_images, 'public');
                $data['image']=$path;
            }
            ProductFeature::where('id',$id)->update($data);
        }
        toastr()->success('Product-Accessory Updated Successfully');
        return redirect()->route('products.features.edit',['product'=>$product_id,'feature'=>$id]);
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
