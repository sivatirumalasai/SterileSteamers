<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function productInfo($id)    
    {
        $product=Product::where('code',$id)->first();
        if($product){
            $user=Auth::user();
            $cart=false;
            if($user){
                if($product->cartItems()->where('user_id', $user->id)->first()){
                    $cart=true;
                }
            }
            return view('product-info',["product"=>$product,'features'=>$product->features,'specifications'=>$product->specifications,'cart'=>$cart,'title'=>'Products']);
        }
        return redirect()->back();
    }
    public function sai()
    {  
        dd(Auth::user());
    }
}
