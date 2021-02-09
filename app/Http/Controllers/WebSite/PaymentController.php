<?php

namespace App\Http\Controllers\WebSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Redirect;

class PaymentController extends Controller
{
    public function payment(Request $request)
    {
        //Input items of form
        $input = $request->all();
        //get API Configuration 
        $api = new Api(config('razorpay.razor_key'), config('razorpay.razor_secret'));
        //Fetch payment information by razorpay_payment_id
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::put('error',$e->getMessage());
                return redirect()->back();
            }

            // Do something here for store payment details in database...
        }
        
        \Session::put('success', 'Payment successful, your order will be despatched in the next 48 hours.');
        return redirect()->back();
    }
    public function pay() {
        $api = new Api(config('razorpay.razor_key'), config('razorpay.razor_secret'));

        // Orders
        $order  = $api->order->create(array('receipt' => '123', 'amount' => 100, 'currency' => 'INR')); // Creates order
        $orderId = $order['id']; // Get the created Order ID
        $order  = $api->order->fetch($orderId);
       // dd($order);
        //$orders = $api->order->all($options); // Returns array of order objects
        $payments = $api->order->fetch($orderId)->payments(); // Returns array of payment objects against an order
        $payment  = $api->payment->fetch("pay_GXtOZ0TaaVKsxW"); // Returns a particular payment
        dd($payment);
    }

    public function dopayment(Request $request) {
        //Input items of form
        $input = $request->all();

        // Please check browser console.
        print_r($input);
        exit;
    }
}
