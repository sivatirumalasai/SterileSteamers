<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Models\Accessory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccessoryController extends Controller
{
    public function index()
    {
        dd(Auth::check());
        return view('accessory-list',['title'=>'Accessories']);
    }
    public function accessoryInfo($id)    
    {
        $accessory=Accessory::where('code',$id)->first();
        if($accessory){
            return view('accessory-info',['accessory'=>$accessory,'title'=>'Accessories']);
        }
        return redirect()->back();
    }
}
