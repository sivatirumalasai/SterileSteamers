<?php

namespace App\Http\Controllers\WebServices;

use App\Http\Controllers\Controller;
use App\Models\Accessory;
use App\Models\Product;
use App\Models\Service;
use App\Models\ServiceVanDetail;
use App\Models\User;
use App\Models\UserCart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Rennokki\Plans\Models\PlanModel;

class WebServicesController extends Controller
{
    public function products()
    {
        $products=Product::where('status',1)->paginate(15);
        $products->map(function ($product, $key) {
            foreach(json_decode($product->images) as $product_image){
                $product->images=url(Storage::url($product_image));
                break;
            }
            unset($product->created_at);
            unset($product->updated_at);
            unset($product->status);
        });
        $data=collect($products);
        $links=collect($data['links']);
        $links=$links->map(function ($link)
        {
            $link['label']=$link['label']."";
            return $link;
        });
        $data['links']=$links;
        return response()->json(['message'=>'success','data'=>$data]);
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
            if($product->specifications){
                unset($product->specifications->created_at);
                unset($product->specifications->updated_at);
                unset($product->specifications->status);
                unset($product->specifications->id);
                unset($product->specifications->product_id);
            }
            return response()->json(['message'=>'success','data'=>$product]);
        }
        
        return response()->json(['message'=>'Product Not found','data'=>[]],JsonResponse::HTTP_FORBIDDEN);
    }
    public function accessories()
    {
        $accessories=Accessory::where('status',1)->paginate(15);
        $accessories->map(function ($accessory, $key) {
            foreach(json_decode($accessory->images) as $product_image){
                $accessory->images=url(Storage::url($product_image));
                break;
            }
            unset($accessory->created_at);
            unset($accessory->updated_at);
            unset($accessory->status);
        });
        $data=collect($accessories);
        $links=collect($data['links']);
        $links=$links->map(function ($link)
        {
            $link['label']=$link['label']."";
            return $link;
        });
        $data['links']=$links;
        return response()->json(['message'=>'success','data'=>$data]);
    }
    public function accessoryDetails($accessory_id)
    {
        $accessory=Accessory::where('status',1)->where('id',$accessory_id)->first();
        if($accessory){
            $images=[];
            foreach(json_decode($accessory->images) as $product_image){
                $images[]=url(Storage::url($product_image));
            }
            $accessory->images=$images;
            unset($accessory->created_at);
            unset($accessory->updated_at);
            unset($accessory->status);
            unset($accessory->id);
            return response()->json(['message'=>'success','data'=>$accessory]);
        }
        
        return response()->json(['message'=>'Accessory Not found','data'=>[]],JsonResponse::HTTP_FORBIDDEN);
    }
    public function services()
    {
        $services=Service::where('status',1)->get();
        $services->map(function ($service,$index)
        {
            $service->service_id=$service->id;
            $service->image=url(Storage::url($service->image));
            $service->icon=$service->icon?url(Storage::url($service->icon)):"";
            unset($service->id);
            unset($service->created_at);
            unset($service->updated_at);
            unset($service->status);
        });
        return response()->json(['message'=>'success','data'=>$services]);
    }
    public function serviceCategories($service_id)
    {
        $service=Service::where('id',$service_id)->where('status',1)->first();
        $trucks=ServiceVanDetail::where('status',1)->get();
        $features=PlanModel::all();
        $categories=[];
        if($categories=$service->categories){
            $categories->map(function ($category,$cindex)
            {
                if($plans=$category->plans){
                    $plans->map(function ($plan,$cindex)
                    {
                        
                        $plan->image=url(Storage::url($plan->image));
                        $plan->plan_id=$plan->id;
                        unset($plan->id);
                        unset($plan->created_at);
                        unset($plan->updated_at);
                        unset($plan->status);
                        unset($plan->service_category_id);
                    });
                }
                else{
                    $category->plans=[];
                }
                $category->image=url(Storage::url($category->image));

                $category->icon=$category->icon?url(Storage::url($category->icon)):"";
                unset($category->created_at);
                unset($category->updated_at);
                unset($category->status);
                unset($category->service_id);
            });
        }
        else{
            $service->categories=[];
        }
        if($trucks){
            $trucks->map(function($truck,$index){
                $truck->truck_id=$truck->id;
                unset($truck->id);
                unset($truck->owner_name);
                unset($truck->owner_mobile);
                unset($truck->status);
                unset($truck->created_at);
                unset($truck->updated_at);
            });
        }
        else{
            $trucks=[];
        }
        if($features){
            $features->map(function($plan,$index){
                $plan->addon_id=$plan->id;
                $plan->duration=$plan->duration.' mins';
                unset($plan->id);
                unset($plan->metadata);
                unset($plan->currency);
                unset($plan->status);
                unset($plan->created_at);
                unset($plan->updated_at);
            });
        }
        else{
            $features=[];
        }
        return response()->json(['message'=>'success','data'=>$categories,'trucks'=>$trucks,'addOns'=>$features]);
    }
    public function cartItems($user_id)
    {
        $user=User::find($user_id);
        if($user){
            $cart_items=$user->cartItems->map(function ($cart_item)
            {
                    unset($cart_item->model->id);
                    unset($cart_item->model->created_at);
                    unset($cart_item->model->updated_at);
                    unset($cart_item->model->status);
                    $images=[];
                    foreach(json_decode($cart_item->model->images) as $product_image){
                        $images=url(Storage::url($product_image));
                        break;
                    }
                    $cart_item->model->images=$images;
                
                if($cart_item->model_type=='App\Models\Product'){
                    $cart_item->model_type='product';
                }
                else{
                    $cart_item->model_type='accessories';
                }
                
                $cart_item->price=$cart_item->price*$cart_item->quantity;
                unset($cart_item->model_type);
                unset($cart_item->status);
                unset($cart_item->created_at);
                unset($cart_item->user_id);
                unset($cart_item->id);
                
                return $cart_item;
               // return $cart_item->model=$cart_item->model;
            });
            return response()->json(['message'=>'success','data'=>$cart_items]);
        }
        return response()->json(['message'=>'User Not found','data'=>[]],JsonResponse::HTTP_FORBIDDEN);
    }
    public function addToCart(Request $request)
    {   
        if($request->has('item_id')){
            if($request->has('item_type')){
                $user=User::find($request->json('user_id'));
                if($user){
                    if($request->json('item_type')=='product'){
                        $product=Product::find((int)$request->json('item_id'));  
                    }
                    else{
                        $product=Accessory::find((int)$request->json('item_id'));  
                    }
                    if($product){
                        $cart_order=UserCart::where('model_type', get_class($product))->where('model_id',$product->id)->where('user_id',$user->id)->first();
                        if($cart_order){
                            $cart_order->quantity=$request->json('quantity');
                            $cart_order->save();
                        }
                        else{
                            $cart_order=UserCart::create(['model_id' => $product->id,
                            'model_type' => get_class($product),'user_id'=>$user->id,'quantity'=>$request->json('quantity'),'price'=>$product->actual_price]);
                        }          
                        
                        return  response()->json(['message'=>'Product Added to cart','data'=>$this->cartItems($user->id)->original['data']]);
                    }
                    return response()->json(['message'=>'Invalid Item','data'=>[]],JsonResponse::HTTP_FORBIDDEN);
                }
                return response()->json(['message'=>'User Not found','data'=>[]],JsonResponse::HTTP_FORBIDDEN);
            }
            return  response()->json(['message'=>'invalid data'],JsonResponse::HTTP_METHOD_NOT_ALLOWED);
        }
    }
}
