<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\UserOrder;
use App\Models\UserOrderAddOn;
use App\Models\UserOrderDetail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Rennokki\Plans\Models\PlanModel;

class ServiceController extends Controller
{
    public function serviceInfo($id=0)    
    {   
        if($id==0){
            $service=Service::first();
        }
        else{
            $service=Service::where('id',$id)->first();
        }
        if($service){
            return view('service-info',["service"=>$service,'title'=>'Services']);
        }
        return redirect()->back();
    }
    public function serviceRequest(Request $request)
    {
        $service_details=json_decode($request->service_data);
        $service_category=ServiceCategory::where('name',$service_details->vehicle->name)->first();
        if($service_category){
            $service_category_plan=$service_category->plans()->where('name',$service_details->package->name)->first();
            $paymentcontroller=new PaymentController;
            if($service_category_plan){
                $user=Auth::user();
                $order=UserOrder::create([
                    'user_id'=>$user->id,
                    'quantity'=>1,
                    'actual_amount'=>$service_details->cost->price->value,
                    'discount_amount'=>0,
                    'final_amount'=>$service_details->cost->price->value,
                    'first_name'=>$request->first_name,
                    'last_name'=>$request->last_name,
                    'mobile'=>$request->mobile,
                    'email'=>$request->email,
                    'address'=>$request->address,
                    'user_message'=>"",
                    'booking_date'=>$request->booking_date,
                    'latitude'=>$request->userlocation['lat'],
                    'longitude'=>$request->userlocation['lng'],
                ]);
                 if($order){
                     $order->orderDetails()->save(new UserOrderDetail([
                         'model_id'=>$service_category_plan->id,
                         'model_type'=>"App\Models\ServiceCategoryPlan",
                         'quantity'=>1,
                         'actual_amount'=>$service_category_plan->actual_price,
                         'discount_amount'=>0,
                         'final_amount'=>$service_category_plan->actual_price,
                     ]));
                     $total_actual_price=$service_category_plan->actual_price;
                     $total_discount=0;
                    foreach($service_details->service as $service_detail){
                        $add_on_plan=PlanModel::where("name",$service_detail->name)->first();
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

                return  response()->json(['message'=>'Invalid Order'],JsonResponse::HTTP_METHOD_NOT_ALLOWED);
            }
            return  response()->json(['message'=>'Invalid Service Plan'],JsonResponse::HTTP_METHOD_NOT_ALLOWED);
        }
        return  response()->json(['message'=>'Invalid Service request'],JsonResponse::HTTP_METHOD_NOT_ALLOWED);
    }
}
