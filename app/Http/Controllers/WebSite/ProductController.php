<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productInfo($id)    
    {
        $product=Product::where('code',$id)->first();
        if($product){
            return view('product-info',["product"=>$product,'features'=>$product->features,'specifications'=>$product->specifications]);
        }
        return redirect()->back();
    }
}
