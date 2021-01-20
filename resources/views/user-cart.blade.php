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
                                    <div class="handle-counter" id="handleCounter">
                                        <button class="counter-minus btn btn-primary">-</button>
                                        <input type="text" name="name" value="{{ $item->quantity }}" >
                                        <button class="counter-plus btn btn-primary">+</button>
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
                        <h3>Booking summary</h3>
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

                        </ul>	

                        <!-- Layout -->
                        <ul class="template-layout-100 template-layout-margin-reset template-clear-fix">

                            <!-- Message -->
                            <li>
                                <div class="template-component-form-field">
                                    <label for="booking-form-message">Message *</label>
                                    <textarea rows="1" cols="1" name="booking-form-message" id="booking-form-message"></textarea>
                                </div>						
                            </li>

                        </ul>

                        <!-- Text + submit button -->
                        <div class="template-align-center template-clear-fix template-margin-top-2">
                            <p class="template-padding-reset template-margin-bottom-2">We will confirm your appointment with you by phone or e-mail within 24 hours of receiving your request.</p>
                            <input type="submit" value="Confirm Booking" class="template-component-button" name="booking-form-submit" id="booking-form-submit"/>
                            <input type="hidden" value="" name="booking-form-data" id="booking-form-data"/>
                        </div> 

                    </div>

                </li>
                
            </ul>

        </form>
            
    </div>

</div>

<script type="text/javascript">
    jQuery(document).ready(function($)
    {
        $('#template-booking').booking();
    });
</script>
<script src="{{ URL::asset('app/js/handleCounter.js') }}"></script>
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
//            console.log(d)
        }
    </script>
@stop
@section('footer')
@include('layouts.footer')
@endsection