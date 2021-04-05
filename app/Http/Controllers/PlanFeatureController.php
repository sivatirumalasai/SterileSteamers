<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rennokki\Plans\Models\Features;
use Rennokki\Plans\Models\PlanFeatureModel;
use Rennokki\Plans\Models\PlanModel;

class PlanFeatureController extends Controller
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
    public function index($id)
    {
        $plan=PlanModel::find($id);
        if($plan){
            $plan->features;
            
            return view('admin.plan_features.index',['plan'=>$plan,'title'=>'plans']);
        }
        toastr()->error('invalid plan id');
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $plan=PlanModel::find($id);
        if ($plan) {
        $plan_features=$plan->features()->select(['code'])->get();
    	$features_list=Features::whereNotIN('code',$plan_features)->orderBy('code','asc')->get();
            return view('admin.plan_features.add',['plan'=>$plan,'features_list'=>$features_list,'title'=>'plans']);
        }
        else{
            toastr()->error('Plan Not Found');
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $plan=PlanModel::find($id);
        if ($plan) {
            $feature=Features::where('code',$request->plan_feature)->first();
            PlanFeatureModel::updateOrCreate(['plan_id'=>$plan->id,'code'=>$request->plan_feature],
            [
                'name'=>$feature->name,
                'code'=>$feature->code,
                'description'=>$request->description,
                'type'=>$request->feature_type,
                'limit'=>$request->limit
            ]);
            $plan_features=$plan->features()->select(['code'])->get();
            $features_list=Features::whereNotIN('code',$plan_features)->orderBy('code','asc')->get();
            toastr()->success($feature->name.' addded successfully');
            return view('admin.plan_features.add',['plan'=>$plan,'features_list'=>$features_list,'title'=>'plans']);
        }
        else{
            toastr()->error('Plan Not Found');
            return redirect()->route('plans.index');
        }
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
        //
    }
}
