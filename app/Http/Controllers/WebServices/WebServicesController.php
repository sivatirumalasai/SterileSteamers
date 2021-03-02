<?php

namespace App\Http\Controllers\WebServices;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebSite\PaymentController;
use App\Models\Accessory;
use App\Models\OperatorService;
use App\Models\Product;
use App\Models\Service;
use App\Models\ServiceCategoryPlan;
use App\Models\ServiceVanDetail;
use App\Models\User;
use App\Models\UserCart;
use App\Models\UserOrder;
use App\Models\UserOrderAddOn;
use App\Models\UserOrderDetail;
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
                $plan->duration=$plan->duration;
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
                return response()->json(['message'=>'User Not found','data'=>[]],JsonResponse::HTTP_UNAUTHORIZED);
            }
            return  response()->json(['message'=>'invalid data'],JsonResponse::HTTP_METHOD_NOT_ALLOWED);
        }
    }
    public function updateProfile(Request $request)
    {
        if($request->has('user_id')){
            $user=User::find($request->user_id);
            if($user){
                if($request->has('name')){
                    $user->name=$request->name;
                }
                if($request->has('email')){
                    if($user->email==Null){
                        $email_verify=User::where('email',$request->email)->first();
                        if($email_verify){
                            return response()->json(['message'=>'Email has Already taken','data'=>[]],JsonResponse::HTTP_FORBIDDEN);
                        }
                        $user->email=$request->email;
                    } 
                }
                if($request->has('latitude')){
                    if($service_van=$user->serviceVan){
                        $service_van->latitude=$request->latitude;
                        $service_van->save();
                    }
                }
                if($request->has('longitude')){
                    if($service_van=$user->serviceVan){
                        $service_van->latitude=$request->longitude;
                        $service_van->save();
                    }
                }
                if($request->profile_pic){
                    $path=Storage::disk('public')->put('users', $request->profile_pic, 'public');
                    $user->profile_pic=$path;
                }
                $user->save();
                $user->profile_pic=($user->profile_pic)? url(Storage::url($user->profile_pic)):null;
                
                return response()->json(['message'=>'success','data'=>$user]);
            }
            return response()->json(['message'=>'User Not found','data'=>[]],JsonResponse::HTTP_FORBIDDEN);
        }
        return  response()->json(['message'=>'invalid data User Id missing'],JsonResponse::HTTP_METHOD_NOT_ALLOWED);
    }
    public function createOrderSummery(Request $request)
    {
        if($request->has("order_type")){
            $user=User::find($request->user_id);
            if($user){
                
                $paymentcontroller=new PaymentController;
                if($request->order_type==='product'){
                    if($user->cartItems()->count()){
                        $order=UserOrder::create([
                            'user_id'=>$user->id,
                            'quantity'=>$user->cartItems->sum('quantity'),
                            'actual_amount'=>$user->cartItems->sum('price'),
                            'discount_amount'=>0,
                            'final_amount'=>$user->cartItems->sum('price')-0,
                            'first_name'=>$request->first_name,
                            'last_name'=>$request->last_name,
                            'mobile'=>$request->mobile,
                            'email'=>$request->email,
                            'address'=>$request->address,
                            'user_message'=>$request->user_message,
                            'booking_date'=>$request->booking_date,
                            'latitude'=>$request->latitude,
                            'longitude'=>$request->logitude,
                        ]);
                        if($order){
                            $total_actual_price=0;
                            $total_discount=0;
                            foreach($user->cartItems as $cart_item){
                                $total_actual_price+=$cart_item->model->actual_price;
                                $total_discount+=($cart_item->model->actual_price-$cart_item->model->discount);
                                $order->orderDetails()->save(new UserOrderDetail([
                                    'model_id'=>$cart_item->model_id,
                                    'model_type'=>$cart_item->model_type,
                                    'quantity'=>$cart_item->quantity,
                                    'actual_amount'=>$cart_item->model->actual_price,
                                    'discount_amount'=>$cart_item->model->actual_price-$cart_item->model->discount,
                                    'final_amount'=>$cart_item->model->discount,
                                ]));
                               // $cart_item->delete();
                            }
                            $order->actual_amount=$total_actual_price;
                            $order->discount_amount=$total_discount;
                            $order->final_amount=$total_actual_price-$total_discount;
                            $order->order_id=$paymentcontroller->generateOrderId(['amount'=>$total_actual_price-$total_discount,'id'=>$order->id]);
                            $order->save();
                            return  response()->json(['message'=>'success','data'=>$order],JsonResponse::HTTP_OK); 
                        }
                    }
                    return  response()->json(['message'=>'Cart Empty'],JsonResponse::HTTP_METHOD_NOT_ALLOWED);
                }
                if($request->order_type==='service'){
                    $service=ServiceCategoryPlan::find($request->service_plan_id);
                    if($service){
                       //'model_id' => $product->id,
                       //'model_type' => get_class($product)
                       $order=UserOrder::create([
                        'user_id'=>$user->id,
                        'quantity'=>1,
                        'actual_amount'=>$service->actual_price,
                        'discount_amount'=>$service->actual_price-$service->discount_price,
                        'final_amount'=>$service->discount_price,
                        'first_name'=>$request->first_name,
                        'last_name'=>$request->last_name,
                        'mobile'=>$request->mobile,
                        'email'=>$request->email,
                        'address'=>$request->address,
                        'user_message'=>$request->user_message,
                        'booking_date'=>$request->booking_date,
                        'latitude'=>$request->latitude,
                        'longitude'=>$request->logitude,
                    ]);
                    if($order){
                        $order->orderDetails()->save(new UserOrderDetail([
                            'model_id'=>$service->id,
                            'model_type'=>get_class($service),
                            'quantity'=>1,
                            'actual_amount'=>$service->actual_price,
                            'discount_amount'=>$service->actual_price-$service->discount_price,
                            'final_amount'=>$service->discount_price,
                        ]));
                        $total_actual_price=$service->actual_amount;
                        $total_discount=$service->actual_price-$service->discount_price;
                        foreach($request->add_ons as $add_on){
                            $add_on_plan=PlanModel::find($add_on);
                            if($add_on_plan){
                                $total_actual_price+=$add_on_plan->price;
                                $total_discount+=0;
                                $order->orderAddons()->save(new UserOrderAddOn([
                                    'model_id'=>$add_on_plan->id,
                                    'model_type'=>get_class($add_on_plan),
                                    'quantity'=>1,
                                    'actual_amount'=>$add_on_plan->price,
                                    'discount_amount'=>0,
                                    'final_amount'=>$add_on_plan->price,
                                ]));
                            }
                        }
                        $order->actual_amount=$total_actual_price;
                        $order->discount_amount=$total_discount;
                        $order->final_amount=$total_actual_price-$total_discount;
                        $order->order_id=$paymentcontroller->generateOrderId(['amount'=>$total_actual_price-$total_discount,'id'=>$order->id]);
                        $order->save();
                        return  response()->json(['message'=>'success','data'=>$order],JsonResponse::HTTP_OK);  
                    } 
                }
                return  response()->json(['message'=>'Invalid Service Selected'],JsonResponse::HTTP_METHOD_NOT_ALLOWED);
            }
            return  response()->json(['message'=>'invalid Order Type'],JsonResponse::HTTP_UNAUTHORIZED);
            }
            else{
                return  response()->json(['message'=>'invalid User'],JsonResponse::HTTP_UNAUTHORIZED);
            }
        }
        return  response()->json(['message'=>'invalid data'],JsonResponse::HTTP_METHOD_NOT_ALLOWED);
    }
    public function orderUpdate(Request $request)
    {
        if($request->has('order_id')){
            $order_details=UserOrder::where('order_id',$request->order_id)->first();
            if($order_details){
                $order_details->txn_id=$request->payment_id;
                $order_details->txn_msg=$request->payment_msg;
                $order_details->txn_status=$request->payment_status;
                $order_details->save(); 
                if($request->payment_status==1){
                    $user=User::find($order_details->user_id);
                    if($user){
                        $user->cartItems()->delete();
                    }
                }
                return  response()->json(['message'=>'success','data'=>$order_details],JsonResponse::HTTP_OK); 
            }
        }
        return  response()->json(['message'=>'invalid data'],JsonResponse::HTTP_METHOD_NOT_ALLOWED);
    }
    public function userOrders($user_id)
    {
        $user=User::find($user_id);
        if($user){
            $user_orders=UserOrder::whereNotNull('order_id')->where('user_id',$user->id)->orderBy('id','desc')->paginate(3);
            $orders=$user_orders->map(function($order){
                if($order->orderDetails){
                    $order->orderDetails->map(function ($order_detail)    
                    {
                        $order_detail->model;
                        if($order_detail->model){
                            if($order_detail->model_type==='App\Models\ServiceCategoryPlan'){
                                $order_detail->order_type="service";
                                $order_detail->images=url(Storage::url($order_detail->model->image));
                                $order_detail->service_name=$order_detail->model->category->service->name;
                                $order_detail->category_name=$order_detail->model->category->name;
                                $order_detail->name=$order_detail->model->name;
                            }
                            else{
                                $order_detail->order_type="product";
                                foreach(json_decode($order_detail->model->images) as $product_image){
                                    $order_detail->images=url(Storage::url($product_image));
                                    $order_detail->name=$order_detail->model->name;
                                    break;
                                }
                            }
                            unset($order_detail->id);
                            unset($order_detail->user_order_id);
                            unset($order_detail->model);
                            unset($order_detail->model_id);
                            unset($order_detail->model_type);
                            // unset($order_detail->model->created_at);
                            // unset($order_detail->model->updated_at);
                            // unset($order_detail->model->status);
                        }
                        
                    });
                    
                }
                unset($order->id);
                unset($order->user_id);
                return $order;
            });
            $user_orders=collect($user_orders);
            $orders1['orders']=collect($orders);
            $links=collect($user_orders['links']);
            $links=$links->map(function ($link)
            {
                $link['label']=$link['label']."";
                return $link;
            });
            $orders1['links']=$links;
            return  response()->json(['message'=>'success','data'=>$orders1],JsonResponse::HTTP_OK); 
        }
        return  response()->json(['message'=>'invalid User Id'],JsonResponse::HTTP_METHOD_NOT_ALLOWED);

    }
    public function pendingServices()
    {
        
        $orders=UserOrderDetail::where('model_type','App\Models\ServiceCategoryPlan')->whereHas('order', function ($query) {
            return $query->where("delivery_status",0)->where('txn_status',1);
        })->with(['order','model'])->get();
        $service_orders=$orders->map(function ($service)
        {
            if($order=$service->order){
                $service->service_name=$service->model->category->service->name;
                $service->category_name=$service->model->category->name;
                $service->plan_name=$service->model->name;
                $service->price=$order->final_amount;
                $service->status='pending';
                unset($service->id);
                unset($service->user_order_id);
                unset($service->model_id);
                unset($service->model_type);
                unset($service->quantity);
                unset($service->actual_amount);
                unset($service->discount_amount);
                unset($service->final_amount);
                unset($service->updated_at);
                unset($service->created_at);
                $service->service_date=$order->booking_date;
                $service->order_id=$order->order_id;
                $service->latitude=$order->latitude;
                $service->longitude=$order->longitude;
                $service->addOns=$order->orderAddons;
                unset($service->model);
                unset($service->order);
                unset($service->addOns);
                return $service;
            }
        });
        return response()->json(['message'=>'success','data'=>$service_orders]);
    }
    public function serviceDetails($order_id)
    {
        $service_order=UserOrder::where('order_id',$order_id)->where("delivery_status",0)->where('txn_status',1)->first();
        if($service_order){
            $service=$service_order->orderDetails()->where('model_type','App\Models\ServiceCategoryPlan')->first();
            if($service){
                $service->service_name=$service->model->category->service->name;
                $service->category_name=$service->model->category->name;
                $service->plan_name=$service->model->name;
                $service->total_amount_paid=$service_order->final_amount;
                $service->service_amount=$service->final_amount;
                $service->servcie_duration=$service->model->duration;
                $service->status='pending';
                $service->service_date=$service_order->booking_date;
                $service->order_id=$service_order->order_id;
                $service->latitude=$service_order->latitude;
                $service->longitude=$service_order->longitude;
                $service->addOns=[];
                if($service_order->orderAddons()->count()){
                    $service->addOns=$service_order->orderAddons->map(function ($add_on)
                    {
                        $add_on->name=$add_on->model->name;
                        $add_on->duration=$add_on->model->duration;
                        unset($add_on->id);
                        unset($add_on->user_order_id);
                        unset($add_on->model_id);
                        unset($add_on->model_type);
                        unset($add_on->quantity);
                        unset($add_on->actual_amount);
                        unset($add_on->discount_amount);
                        unset($add_on->updated_at);
                        unset($add_on->created_at);
                        unset($add_on->model);
                        return $add_on;
                    });
                }
                unset($service->id);
                unset($service->user_order_id);
                unset($service->model_id);
                unset($service->model_type);
                unset($service->quantity);
                unset($service->actual_amount);
                unset($service->discount_amount);
                unset($service->final_amount);
                unset($service->updated_at);
                unset($service->created_at);
                unset($service->model);
                unset($service->order);
                return response()->json(['message'=>'success','data'=>$service]);
            }
            return  response()->json(['message'=>'service data unavailable'],JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        }
        return  response()->json(['message'=>'invalid order id'],JsonResponse::HTTP_METHOD_NOT_ALLOWED);

    }
    public function acceptService(Request $request)
    {
        $service_order=UserOrder::where('order_id',$request->json('order_id'))->where("delivery_status",0)->where('txn_status',1)->first();
        if($service_order){
            $service_order->delivery_status=3;
            $service_order->delivery_message="in progress";
            $service_order->save();
            OperatorService::updateOrCreate(["user_order_id"=>$service_order->id],['user_id'=>$request->json('user_id')]);
            return response()->json(['message'=>'success','data'=>$service_order]);
        }
        return  response()->json(['message'=>'invalid order id'],JsonResponse::HTTP_METHOD_NOT_ALLOWED);
    }
    public function completeService(Request $request)
    {
        $service_order=UserOrder::where('order_id',$request->json('order_id'))->where('user_id',$request->json('user_id'))->where('txn_status',1)->first();
        if($service_order){
            if($service_order->delivery_status==0 || $service_order->delivery_status==2 || $service_order->delivery_status==1){
                return  response()->json(['message'=>"you can't change status of order:status code".$service_order->delivery_status],JsonResponse::HTTP_METHOD_NOT_ALLOWED);
            }
            $service_order->delivery_status=1;
            $service_order->delivery_message="completed";
            $service_order->save();
            $operatorService=OperatorService::where("user_order_id",$service_order->id)->first();
            if($request->has("rating")){
                $operatorService->rating=$request->json('rating');
            }
            if($request->has('comment')){
                $operatorService->comments=$request->json("comment");
            }
            $operatorService->save();
            return response()->json(['message'=>'success','data'=>$service_order]);
        }
        return  response()->json(['message'=>'invalid order id'],JsonResponse::HTTP_METHOD_NOT_ALLOWED);
    }
    public function operatorServicesHistory($user_id)
    {
        $user=User::where('id',$user_id)->where('user_type','operator')->first();
        if($user){
            $service_orders=$user->servicesHistory->map(function ($service)
        {
            if($order=$service->order){
                $service->service_name=$order->orderDetails()->first()->model->category->service->name;
                $service->category_name=$order->orderDetails()->first()->model->category->name;
                $service->plan_name=$order->orderDetails()->first()->model->name;
                $service->price=$order->final_amount;
                $status='pending';
                if($order->delivery_status==1){
                    $status='completed';
                }
                else if($order->delivery_status==2){
                    $status='Rejected';
                }
                else if($order->delivery_status==3){
                    $status='inprogress';
                }
                $service->status=$status;
                unset($service->id);
                unset($service->user_order_id);
                unset($service->model_id);
                unset($service->model_type);
                unset($service->quantity);
                unset($service->actual_amount);
                unset($service->discount_amount);
                unset($service->final_amount);
                unset($service->updated_at);
                unset($service->created_at);
                $service->service_date=$order->booking_date;
                $service->order_id=$order->order_id;
                $service->latitude=$order->latitude;
                $service->longitude=$order->longitude;
                $service->addOns=$order->orderAddons;
                unset($service->model);
                unset($service->order);
                unset($service->addOns);
                return $service;
            }
        });
            return response()->json(['message'=>'success','data'=>$service_orders]);
        }
        return  response()->json(['message'=>'invalid operator id'],JsonResponse::HTTP_METHOD_NOT_ALLOWED);
    }
    public function currentService($user_id)
    {
        $user=User::where('id',$user_id)->where('user_type','customer')->first();
        if($user){
            //$service=$user->serviceVan;
            $user_service_order=$user->orders()->where('delivery_status',3)->first();
            if($user_service_order){
                if($on_going_order=$user_service_order->onGoingOrder){
                    $operator=User::find($on_going_order->user_id);
                    $vandetails=$operator->serviceVan;
                    $data['vandetails']=$vandetails;
                    $data['orderDetails']['latitude']=$user_service_order->latitude;
                    $data['orderDetails']['longitude']=$user_service_order->longitude;
                    return response()->json(['message'=>'success','data'=>$data]);
                }
            }
            
            return response()->json(['message'=>'success','data'=>[]]);
        }
        return  response()->json(['message'=>'invalid operator id'],JsonResponse::HTTP_METHOD_NOT_ALLOWED);
    }
}
