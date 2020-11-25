<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Models\Accessory;
use Illuminate\Http\Request;

class AccessoryController extends Controller
{
    public function index()
    {
        return view('accessory-list');
    }
    public function accessoryInfo($id)    
    {
        $accessory=Accessory::where('code',$id)->first();
        if($accessory){
            return view('accessory-info',['accessory'=>$accessory]);
        }
        return redirect()->back();
    }
}
