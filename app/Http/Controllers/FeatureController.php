<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Rennokki\Plans\Models\Features;

class FeatureController extends Controller
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
        $features=Features::all();
        return view('admin.features.index',['features'=>$features,'title'=>'features']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.features.add",['title'=>'features']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $status=false;
            if($request->has('status')){
                $status=true;
            }
            $add_feature = Features::create([
                'name'=>$request->name,
                'code'=>$request->code,
                'status'=>$status
            ]);
            toastr()->success("Success");
            return redirect()->route('features.create');
        }
        catch (Exception $exception){
            toastr()->error($exception->getMessage());
            return redirect()->back();
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
        try {
            if(Features::find($id)){
                $feature = Features::where('id',$id)->delete();
                toastr()->success("Deleted Successfully");
                return redirect()->back();
            }
            else{
                toastr()->error("Not Deleted");
                return redirect()->back();
            }
        }
        catch (QueryException $exception){
            toastr()->error($exception->getMessage());
            return redirect()->back();
        }
        catch (Exception $exception){
            toastr()->error($exception->getMessage());
            return redirect()->back();
        }
    }
}
