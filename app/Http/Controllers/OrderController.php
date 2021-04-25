<?php

namespace App\Http\Controllers;

use App\Models\UserOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.orders.index',['title'=>"Orders"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=UserOrder::where('order_id',$id)->first();
        if($order){
            return view('admin.orders.show',['title'=>'orders','order'=>$order]);
        }
        toastr()->warning('Invalid Order Id ');
        return redirect()->back();
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
    public function OrderUpdateStatus($order_id)
    {
        $order=UserOrder::where('order_id',$order_id)->first();
        if($order){
            if($order->txn_status==1){
                $order->delivery_status=3;
                $order->save();
                toastr()->warning('Order Accepted Successfully');
                return redirect()->back();
            }
            toastr()->warning("Payment not done for this order please check");
            return redirect()->back();
        }
        toastr()->warning('Invalid Order Id ');
        return redirect()->back();

    }
    //OrderCompleteStatus
    public function OrderCompleteStatus($order_id)
    {
        $order=UserOrder::where('order_id',$order_id)->first();
        if($order){
            if($order->txn_status==1){
                $order->delivery_status=1;
                $order->save();
                toastr()->warning('Order Accepted Successfully');
                return redirect()->back();
            }
            toastr()->warning("Payment not done for this order please check");
            return redirect()->back();
        }
        toastr()->warning('Invalid Order Id ');
        return redirect()->back();

    }
}
