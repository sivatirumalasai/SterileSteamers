<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Models\Product;
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
        $this->middleware('auth');
    }
    public function index()
    {
        $cart_items=[];
        $user=Auth::user();
        if($user){
            $cart_items=$user->cartItems;
        }
        return view('user-cart',['cart_items'=>$cart_items,'title'=>'UserCart']);
    }
    public function AddToCart(Request $request)
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
}
