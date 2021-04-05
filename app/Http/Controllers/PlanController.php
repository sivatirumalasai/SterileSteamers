<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rennokki\Plans\Models\Features;
use Rennokki\Plans\Models\PlanFeatureModel;
use Rennokki\Plans\Models\PlanModel;

class PlanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.plans.index',['title'=>'plans']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plans.add',['title'=>'plans']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PlanModel::create([
            'name'=>$request->accessory_name,
            'price'=>$request->currency,
            'currency'=>'INR',
            'duration'=>$request->duration,
            'staff'=>$request->staff,
            'description'=>$request->description
        ]);
        toastr()->success("Plan added successfully");
        return view('admin.plans.add',['title'=>'plans']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plans=PlanModel::find($id);
        if ($plans) {

            $plans->features()->delete();
            $plans->delete();
            toastr()->success('Plan Deleted Successfully');
            return view('admin.plans.index');
        }
        else{
            toastr()->error('Plan Not Found');
            return redirect()->route('plans.index');
        }
    }
    public function features($id)
    {
        $plans=PlanModel::find($id);
        if ($plans) {

            $plans->features;
            return view('admin.plan_features.index',['plan'=>$plans,'title'=>'plans']);
        }
        else{
            toastr()->error('Plan Not Found');
            return redirect()->route('plans.index');
        }
    }
    public function createFeature($id)
    {
        $plan=PlanModel::find($id);
        if ($plan) {
        $plan_features=$plan->features()->select(['code'])->get();
    	$features_list=Features::whereNotIN('code',$plan_features)->orderBy('code','asc')->get();
            return view('admin.plan_features.add',['plan'=>$plan,'features_list'=>$features_list,'title'=>'plans']);
        }
        else{
            toastr()->error('Plan Not Found');
            return redirect()->route('plans.index');
        }
    }
    public function storeFeature(Request $request, $id)
    {
        
    }
}
