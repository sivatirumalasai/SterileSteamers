<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function serviceInfo($id)    
    {
        $service=Service::where('id',$id)->first();
        if($service){
            return view('service-info',["service"=>$service,'title'=>'Services']);
        }
        return redirect()->back();
    }
}
