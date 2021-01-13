<?php

namespace App\Http\Controllers\WebServices;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebServicesController extends Controller
{
    public function products()
    {
        $products=Product::where('status',1)->paginate(15);
        $products->map(function ($item, $key) {
            foreach(json_decode($item->images) as $product_image){
                $item->images=url(Storage::url($product_image));
                break;
            }
            
        });
        return response()->json(['message'=>'success','data'=>$products]);
    }
    public function productDetails($product_id)
    {
        $product=Product::where('status',1)->where('id',$product_id)->first();
        if($product){
            $images=[];
            foreach(json_decode($product->images) as $product_image){
                $images[]=url(Storage::url($product_image));
            }
            
            $product->images=$images;
            $product->specifications;
            $product->features->map(function ($item,$key)
            {

                unset($item->created_at);
                unset($item->updated_at);
                unset($item->status);
                unset($item->id);
                unset($item->product_id);
                $item->image=url(Storage::url($item->image));
            });
            $product->contains->map(function ($feature,$key){
                $feature->load('accessory');
                unset($feature->id);
                unset($feature->product_id);
                unset($feature->accessory_id);
                unset($feature->created_at);
                unset($feature->updated_at);
                unset($feature->status);
                
                if($feature->accessory){
                    $feature_images=[];
                    //return $feature->accessory=$feature->accessory->images;
                    foreach(json_decode($feature->accessory->images) as $accessory_images){
                        $feature_images[]=url(Storage::url($accessory_images));
                    }
                    $feature->accessory->images=$feature_images;
                }
            });
            unset($product->created_at);
            unset($product->updated_at);
            unset($product->status);
            unset($product->id);
            unset($product->specifications->created_at);
            unset($product->specifications->updated_at);
            unset($product->specifications->status);
            unset($product->specifications->id);
            unset($product->specifications->product_id);
            return response()->json(['message'=>'success','data'=>$product]);
        }
        
        return response()->json(['message'=>'Product Not found','data'=>[]],JsonResponse::HTTP_FORBIDDEN);
    }
}
