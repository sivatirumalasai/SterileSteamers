<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Rennokki\Plans\Models\PlanModel;

class ServiceCategoryController extends Controller
{
    public function index($service_id)
    {
        $service=Service::where('id',$service_id)->first();
        $plans=PlanModel::where('status',1)->get();
        if($service){
            return view('service-bought',["service"=>$service,'plans'=>$plans,'title'=>'Services']);
        }
        return redirect()->back();
    }    
}
