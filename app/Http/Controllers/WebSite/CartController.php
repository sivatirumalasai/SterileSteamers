<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Http\Controllers\WebServices\WebServicesController;
use App\Models\Accessory;
use App\Models\Product;
use App\Models\User;
use App\Models\UserCart;
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
        //$this->middleware('auth')->except('index');
    }
    public function index()
    {
        $cart_items=[];
        $user=User::find(2);
        //$user=Auth::user();
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
                $user=User::find(2);
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
                $user=User::find(2);
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
                            $cart_order->quantity=$request->quantity;
                            $cart_order->save();
                        }
                        // else{
                        //     $cart_order=UserCart::create(['model_id' => $product->id,
                        //     'model_type' => get_class($product),'user_id'=>$user->id,'quantity'=>$request->json('quantity'),'price'=>$product->actual_price]);
                        // }          
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
}
