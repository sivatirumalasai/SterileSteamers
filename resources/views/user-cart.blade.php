@extends('layouts.app')
@section('header')
<link rel="stylesheet" href="{{ URL::asset('app/css/handle-counter.css') }}">
@include('layouts.header')

@stop
@section('content')


<!-- Content -->
<div class="template-content">
					
    <!-- Section -->
    <div class="template-component-booking template-section template-main" id="template-booking">
        
        <!-- Booking form -->
        <form>

            <ul>

                <!-- Vehcile list -->
                <li>

                    <!-- Step -->
                    <div class="template-component-booking-item-header template-clear-fix" >
                        <span style="display: none">
                            <span>3</span>
                            <span>/</span>
                            <span>4</span>	
                        </span>
                        <h3>User Cart</h3>
                        <h5>User cart services menu.</h5>
                    </div>

                    <!-- Content -->
                    <div class="template-component-booking-item-content">
                        @php
                         $total=0; 
                         $quantity=0;  
                        @endphp
                        <!-- Service list -->
                        <ul class="template-component-booking-service-list">
                            @forelse ($cart_items as $item)
                                <!-- Service -->
                            <li data-id="exterior-hand-wash" class="template-clear-fix">

                                <!-- Name -->
                                <div class="template-component-booking-service-name">
                                    <span>{{ $item->model->name }}</span>					
                                    <a href="#" class="template-component-more-link">
                                        <span>More...</span>
                                        <span>Less...</span>
                                    </a>
                                    <div class="template-component-more-content">
                                        {{ $item->model->description }}					
                                    </div>
                                </div>

                                <!-- Duration -->
                                <div class="template-component-booking-service-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-service-duration-value">{{ $item->quantity }}</span>
                                    @if($item->model_type=='App\Models\Product' || $item->model_type=='App\Models\Accessory')
                                    <span class="template-component-booking-service-duration-unit">unit(s)</span>
                                    @else
                                    <span class="template-component-booking-service-duration-unit">min</span>
                                    @endif
                                </div>
                                @php
                                 $price=$item->quantity*$item->price;
                                 $total+=$price;  
                                 $quantity+=$item->quantity;  
                                @endphp
                                <!-- Price -->
                                <div class="template-component-booking-service-price">
                                    <span class="template-icon-booking-meta-price"></span>
                                    <span class="template-component-booking-service-price-currency">Rs</span>
                                    <span class="template-component-booking-service-price-value">{{ $price }}</span>
                                    <span class="template-component-booking-service-price-unit"></span>
                                    <span class="template-component-booking-service-price-decimal"></span>
                                </div>

                                <!-- Button -->
                                <div class="template-component-button-box">
                                    <div class="handle-counter">
                                        <button class="counter-minus btn btn-primary dec button">-</button>
                                        <input type="text" name="name" itemType={{ ($item->model_type=='App\Models\Product')? 'Product':'Accessory' }} id="{{ $item->id }}" value="{{ $item->quantity }}" >
                                        <button class="counter-plus btn btn-primary inc button">+</button>
                                    </div>
                                    {{-- <a href="#" class="template-component-button">Select</a> --}}
                                </div>

                            </li>
                            @empty
                                <li>No Cart Items</li>
                            @endforelse
                            


                        </ul>

                    </div>

                </li>
                                        <!-- Summary -->


                <li>

                    <!-- Step -->
                    <div class="template-component-booking-item-header template-clear-fix">
                        <span style="display:none">
                            <span>4</span>
                            <span>/</span>
                            <span>4</span>	
                        </span>
                        <h3>Order summary</h3>
                        <h5>Please provide us with your contact information.</h5>
                    </div>


                    <!-- Content -->
                    <div class="template-component-booking-item-content">

                        <ul class="template-component-booking-summary template-clear-fix">

                            <!-- Duration -->
                            <li class="template-component-booking-summary-duration">
                                <div class="template-icon-booking-meta-total-price"></div>
                                <h5>
                                    {{ $quantity }}
                                   
                                    {{-- <span>0</span>
                                    <span>h</span>
                                    &nbsp;
                                    <span>0</span>
                                    <span>min</span> --}}
                                </h5>
                                <span>Quantity</span>
                            </li>

                            <!-- Price -->
                            <li class="template-component-booking-summary-price">
                                <div class="template-icon-booking-meta-total-price"></div>
                                <h5>
                                    <span class="template-component-booking-summary-price-symbol">Rs</span>
                                    <span  class="template-component-booking-summary-price-unit">{{ $total }}</span>
                                </h5>
                                <span>Total Price</span>				
                            </li>

                        </ul>

                    </div>

                    <!-- Content -->
                    <div class="template-component-booking-item-content template-margin-top-reset">
                    <form action="#" id="OrderSummeryForm" onsubmit="return false">
                        <!-- Layout -->
                        <ul class="template-layout-50x50 template-layout-margin-reset template-clear-fix">

                            <!-- First name -->
                            <li class="template-layout-column-left template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-first-name">First Name *</label>
                                    <input type="text" name="booking-form-first-name" id="booking-form-first-name"/>
                                </div>
                            </li>

                            <!-- Second name -->
                            <li class="template-layout-column-right template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-second-name">Second Name *</label>
                                    <input type="text" name="booking-form-second-name" id="booking-form-second-name"/>
                                </div>
                            </li>	

                        </ul>

                        <!-- Layout -->
                        <ul class="template-layout-50x50 template-layout-margin-reset template-clear-fix">

                            <!-- E-mail address -->
                            <li class="template-layout-column-left template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-email">E-mail Address *</label>
                                    <input type="text" name="booking-form-email" id="booking-form-email"/>
                                </div>
                            </li>

                            <!-- Phone number -->
                            <li class="template-layout-column-right template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-phone">Phone Number *</label>
                                    <input type="text" name="booking-form-phone" id="booking-form-phone"/>
                                </div>
                            </li>		

                        </ul>
{{-- 
                        <!-- Layout -->
                        <ul class="template-layout-33x33x33 template-layout-margin-reset template-clear-fix">

                            <!-- Vehicle make -->
                            <li class="template-layout-column-left template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-vehicle-make">Vehicle Make</label>
                                    <input type="text" name="booking-form-vehicle-make" id="booking-form-vehicle-make"/>
                                </div>
                            </li>

                            <!-- Vehicle model -->
                            <li class="template-layout-column-center template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-vehicle-model">Vehicle Model</label>
                                    <input type="text" name="booking-form-vehicle-model" id="booking-form-vehicle-model"/>
                                </div>
                            </li>	


                            <!-- Booking date -->
                            <li class="template-layout-column-right template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-date">Booking Date *</label>
                                    <input type="text" data-field="datetime" name="booking-form-date" id="booking-form-date"/>
                                </div>
                            </li>

                        </ul>	 --}}

                        <!-- Layout -->
                        <ul class="template-layout-100 template-layout-margin-reset template-clear-fix">

                            <!-- Message -->
                            <li>
                                <div class="template-component-form-field">
                                    <label for="booking-form-address">Address *</label>
                                    <textarea rows="1" cols="1" name="booking-form-address" id="booking-form-address"></textarea>
                                </div>						
                            </li>

                        </ul>

                        <!-- Text + submit button -->
                        <div class="template-align-center template-clear-fix template-margin-top-2">
                            <p class="template-padding-reset template-margin-bottom-2">We will confirm your appointment with you by phone or e-mail within 24 hours of receiving your request.</p>
                            <input type="submit" value="Confirm Booking" class="template-component-button" name="booking-form-submit" id="booking-form-submit"/>
                            <input type="hidden" value="" name="booking-form-data" id="booking-form-data"/>
                        </div> 
                        </form>
                    </div>

                </li>
                
            </ul>

        </form>
            
    </div>

</div>
<button id="rzp-button1" style="display: none">Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>var options = {    
    "key": "{{ config('razorpay.razor_key') }}",
    "amount": "{{ $total*100 }}",
    "currency": "INR",    
    "name": "Sterlin Steamers",    
    "description": "Test Transaction",    
    "image": "https://13.232.249.110/media/image/logo.png",    
    "order_id": "",
    "handler": function (response){       
        console.log(response); 
        $.ajax({
            type: "POST",
            url: baseurl+'/successPayment',
            data: {razorpay_order_id:response.razorpay_order_id,razorpay_payment_id:response.razorpay_payment_id,_token:"{{ csrf_token() }}"},
            cache: false,
            success: function(result){
                toastr.success(result.message);
                window.location.reload();
                console.log('success',result);
            },
            error:function(error){
                toastr.error(error.responseJSON.message);
                console.log('error',error);
            }  
        });  
        },    
    "prefill": {        
        "name": "Gaurav Kumar",        
        "email": "gaurav.kumar@example.com",
        "contact": "9999999999"    
    },    
    "notes": {        
        "address": "Razorpay Corporate Office"    
        },    
    "theme": {
        "color": "#3399cc"    
        }
    };
    
    </script>
<script type="text/javascript">
    jQuery(document).ready(function($)
    {
        $('#template-booking').booking();
    });
</script>
<script>
    incrementVar = 0;
    var baseurl="{{ url('/') }}";
    var token="{{ csrf_token() }}";
$('.inc.button').click(function(){
    var $this = $(this),
    $input = $this.prev('input'),
    $parent = $input.closest('div'),
    newValue = parseInt($input.val())+1;
    $parent.find('.inc').addClass('a'+newValue);
    console.log('increment',newValue);
    $input.val(newValue);
    incrementVar += newValue;
    var itemId=$input.attr('id');
    var itemType=$input.attr("itemType");
    if(Number.isInteger(newValue) && newValue>0){
        $.ajax({
            type: "POST",
            url: baseurl+'/AddItemToCart',
            data: {item_type:itemType,_token:token,item_id:itemId,quantity:newValue},
            cache: false,
            success: function(data){
                window.location.reload();
            }
        });
    }
});
$('.dec.button').click(function(){
    var $this = $(this),
    $input = $this.next('input'),
    $parent = $input.closest('div'),
    newValue = parseInt($input.val())-1;
    console.log('decrement',$input.attr('id'));
    $parent.find('.inc').addClass('a'+newValue);
    $input.val(newValue);
    incrementVar += newValue;
    var itemId=$input.attr('id');
    var itemType=$input.attr("itemType");
    if(Number.isInteger(newValue) ){
        $.ajax({
            type: "POST",
            url: baseurl+'/AddItemToCart',
            data: {item_type:itemType,_token:token,item_id:itemId,quantity:newValue},
            cache: false,
            success: function(data){
                window.location.reload();
            }
        });
    }
});
$("#booking-form-submit").on('click',function () {
    let first_name=$("#booking-form-first-name").val();
    let last_name=$("#booking-form-second-name").val();
    let email=$("#booking-form-email").val();
    let phone=$("#booking-form-phone").val();
    let address=$("#booking-form-address").val();
    console.log('submit',first_name);
    $.ajax({
            type: "POST",
            url: baseurl+'/OrderSummeryForm',
            data: {first_name:first_name,last_name:last_name,address:address,phone:phone,_token:"{{ csrf_token() }}",email:email},
            cache: false,
            success: function(result){
                options.order_id=result.data.order_id;
                options.amount=result.data.discount_amount*100;
                console.log("amount",options.amount);
                options.prefill.name=result.data.first_name+' '+result.data.last_name;
                options.prefill.email=result.data.email;
                options.prefill.contact=result.data.mobile;
                options.notes.address=result.data.address;
                $("#rzp-button1").click();
                var rzp1 = new Razorpay(options);
                rzp1.on('payment.failed', function (response){
                    console.log('failed',response);
                    alert(response.error.code);        
                    alert(response.error.description);        
                    alert(response.error.source);        
                    alert(response.error.step);        
                    alert(response.error.reason);        
                    alert(response.error.metadata.order_id);        
                    alert(response.error.metadata.payment_id);
                });
                rzp1.open();
                
            },
            error:function(error){
                toastr.error(error.responseJSON.message)
                console.log('error',error);
            }
        });
});
</script>
{{-- <script src="{{ URL::asset('app/js/handleCounter.js') }}"></script>
    <script>
        $(function ($) {
            var options = {
                minimum: 1,
                maximize: 10,
                onChange: valChanged,
                onMinimum: function(e) {
                    console.log('reached minimum: '+e)
                },
                onMaximize: function(e) {
                    console.log('reached maximize'+e)
                }
            }
            $('#handleCounter').handleCounter(options)
            $('#handleCounter2').handleCounter(options)
			$('#handleCounter3').handleCounter({maximize: 100})
        })
        function valChanged(d) {
           console.log(d)
        }
    </script> --}}
@stop
@section('footer')
@include('layouts.footer')
@endsection