<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebServices\WebServicesController;
use App\Http\Requests\CreateOrderRequest;
use App\Models\Accessory;
use App\Models\Product;
use App\Models\User;
use App\Models\UserCart;
use App\Models\UserOrder;
use App\Models\UserOrderDetail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    public function index()
    {
        $cart_items=[];
        //$user=User::find(2);
        $user=Auth::user();
        if($user){
            $cart_items=$user->cartItems;
        }
        return view('user-cart',['cart_items'=>$cart_items,'title'=>'UserCart']);
    }
    public function sai()
    {  
        dd(Auth::user());
    }
    public function AddToCartOld(Request $request)
    {   
        if($request->has('item_id')){
            if($request->item_type==='product'){
                $product=Product::find($request->item_id);
                $user=Auth::user();
                $cart_order=UserCart::updateOrCreate(['model_id' => $product->id,
                'model' => get_class($product),'user_id'=>$user->id],['quantity'=>1,'price'=>$product->actual_price]);
                return  response()->json(['message'=>'Product Added to cart','data'=>$cart_order]);
            }
            return  response()->json(['message'=>'invalid data'],JsonResponse::HTTP_METHOD_NOT_ALLOWED);
        }
    }
    public function AddToCart(Request $request)
    {
        if($request->has('item_id')){
            if($request->has('item_type')){
                $user=Auth::user();
                if($user){
                    // if($request->item_type=='product'){
                    //     $product=Product::find($request->item_id);  
                    // }
                    // else{
                    //     $product=Accessory::find($request->item_id);  
                    // }
                    // if($product){
                        $cart_order=UserCart::where('id',$request->item_id)->where('user_id',$user->id)->first();
                        if($cart_order){
                            if($request->quantity<=0){
                                $cart_order->delete();
                            }
                            else{
                                $cart_order->quantity=$request->quantity;
                                $cart_order->save();
                            }
                            
                        }
                        else{
                           if($request->item_type=='product'){
                                $product=Product::find($request->item_id);  
                            }
                            else{
                                $product=Accessory::find($request->item_id);  
                            }
                            $cart_order=UserCart::create(['model_id' => $product->id,
                            'model_type' => get_class($product),'user_id'=>$user->id,'quantity'=>1,'price'=>$product->actual_price]);
                        }          
                        $webservices=new WebServicesController();
                        return  response()->json(['message'=>'Cart Updated Successfully','data'=>$webservices->cartItems($user->id)->original['data']]);
                    // }
                    // return response()->json(['message'=>'Invalid Item','data'=>[]],JsonResponse::HTTP_FORBIDDEN);
                }
                return response()->json(['message'=>'User Not found','data'=>[]],JsonResponse::HTTP_FORBIDDEN);
            }
            return  response()->json(['message'=>'invalid data'],JsonResponse::HTTP_METHOD_NOT_ALLOWED);
        }
    
    }
    public function createOrder(CreateOrderRequest $request)
    {   
        $user=Auth::user();
        if($user){
            $paymentcontroller=new PaymentController;
            if($user->cartItems()->count()){
                $order=UserOrder::create([
                    'user_id'=>$user->id,
                    'quantity'=>$user->cartItems->sum('quantity'),
                    'actual_amount'=>$user->cartItems->sum('price'),
                    'discount_amount'=>0,
                    'final_amount'=>$user->cartItems->sum('price')-0,
                    'first_name'=>$request->first_name,
                    'last_name'=>$request->last_name,
                    'mobile'=>$request->phone,
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
        return  response()->json(['message'=>'Please Login'],JsonResponse::HTTP_UNAUTHORIZED);
    }
    public function successPayment(Request $request)
    {
        //pay_GuV6el8PvDUG9s
        if($request->has('razorpay_payment_id') && $request->has("razorpay_order_id")){
            $paymentcontroller=new PaymentController();
            $paymentDetails=$paymentcontroller->paymentById($request->razorpay_payment_id);
            $orderDetails=UserOrder::where('order_id',$request->razorpay_order_id)->first();
            if($orderDetails){
                if($paymentDetails->status=='captured'){
                    $orderDetails->txn_status=1;
                    $orderDetails->txn_msg='captured';
                    $orderDetails->booking_date=date('Y-m-d');
                    $user=Auth::user();
                    $user->cartItems()->delete();
                return  response()->json(['message'=>'Payment has done successfully'],JsonResponse::HTTP_OK);
                }
                else{
                    $orderDetails->txn_status=2;
                    $orderDetails->txn_msg='Failed';
                    $orderDetails->booking_date=date('Y-m-d');

                return  response()->json(['message'=>'Payemnt rejected'],JsonResponse::HTTP_METHOD_NOT_ALLOWED);
                }
                $orderDetails->save();
            }
            return  response()->json(['message'=>'Order Not found'],JsonResponse::HTTP_METHOD_NOT_ALLOWED);
        }
    }   
}
