<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    public function index($service_id)
    {
        $service=Service::where('id',$service_id)->first();
        if($service){
            return view('service-bought',["service"=>$service,'title'=>'Services']);
        }
        return redirect()->back();
    }    
}
