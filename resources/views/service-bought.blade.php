@extends('layouts.app')
@section('header')
@include('layouts.header')
@stop
@section('content')

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style type="text/css">
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 500px;
      }

      /* Optional: Makes the sample page fill the window. */
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script>
     let map, infoWindow;
        let userlocation={};
function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: -34.397, lng: 150.644 },
    zoom: 6,
  });
  infoWindow = new google.maps.InfoWindow();
  const locationButton = document.createElement("button");
  locationButton.textContent = "Pan to Current Location";
  locationButton.classList.add("custom-map-control-button");
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
  locationButton.addEventListener("click", () => {
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
          userlocation=pos;
          console.log('pos',pos);
          infoWindow.setPosition(pos);
          infoWindow.setContent("Location found.");
          infoWindow.open(map);
          map.setCenter(pos);
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  });
  map.addListener("click", (mapsMouseEvent) => {
    // Close the current InfoWindow.
    infoWindow.close();
    // Create a new InfoWindow.
    infoWindow = new google.maps.InfoWindow({
      position: mapsMouseEvent.latLng,
    });
    console.log("sai",mapsMouseEvent.latLng.toJSON());
    userlocation=mapsMouseEvent.latLng.toJSON();
    infoWindow.setContent(

     // JSON.stringify(mapsMouseEvent.latLng.toJSON())
    );
    infoWindow.open(map);
  });

}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn't support geolocation."
  );
  infoWindow.open(map);
}

    </script>
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
                    <div class="template-component-booking-item-header template-clear-fix">
                        <span>
                            <span>1</span>
                            <span>/</span>
                            <span>4</span>	
                        </span>
                        <h3>{{ $service->name }}</h3>
                        <h5>Select Service Category type below.</h5>
                    </div>

                    <!-- Content -->
                    <div class="template-component-booking-item-content">

                        <!-- Vehicle list -->
                        <ul class="template-component-booking-vehicle-list">
                            @foreach ($service->categories as $category)
                                <!-- Vehicle -->
                            <li data-id="{{ $category->name}}">
                                <div>
                                    <!-- Icon -->
                                    <div class="template-icon-vehicle-small-car"></div>				
                                    <!-- Name -->
                                    <div>{{ $category->name }}</div>
                                </div>
                            </li>
                            @endforeach
                            

                        </ul>

                    </div>	

                </li>
                                        <!-- Package list -->


                <li>

                    <!-- Step -->
                    <div class="template-component-booking-item-header template-clear-fix">
                        <span>
                            <span>2</span>
                            <span>/</span>
                            <span>4</span>	
                        </span>
                        <h3>Wash packages</h3>
                        <h5>Which wash is best for your vehicle?</h5>
                    </div>

                    <!-- Content -->
                    <div class="template-component-booking-item-content">

                        <!-- Package list -->
                        <ul class="template-component-booking-package-list">
                            @foreach ($service->categories as $category1)
                                <!-- Package -->
                                @foreach ($category1->plans as $plan)
                                <li data-id="basic-hand-wash-1" data-id-vehicle-rel="{{ $category1->name }}">

                                    <!-- Header -->
                                    <h4 class="template-component-booking-package-name">{{ $plan->name }}</h4>
    
                                    <!-- Price -->
                                    <div class="template-component-booking-package-price">
                                        <span class="template-component-booking-package-price-currency">Rs</span>
                                        <span class="template-component-booking-package-price-total">{{ $plan->actual_price }}</span>
                                        <span class="template-component-booking-package-price-decimal"></span>
                                    </div>
    
                                    <!-- Duration -->
                                    <div class="template-component-booking-package-duration">
                                        <span class="template-icon-booking-meta-duration"></span>
                                        <span class="template-component-booking-package-duration-value">{{ $plan->duration }}</span>
                                        <span class="template-component-booking-package-duration-unit">mins</span>
                                    </div>
    
                                    <!-- Services -->
                                    <ul class="template-component-booking-package-service-list">
                                        <li data-id="exterior-hand-wash">Exterior Hand Wash</li>
                                        <li data-id="towel-hand-dry">Towel Hand Dry</li>
                                        <li data-id="wheel-shine">Wheel Shine</li>
                                    </ul>
    
                                    <!-- Button -->
                                    <div class="template-component-button-box">
                                        <a href="#" class="template-component-button">Book Now</a>
                                    </div>
    
                                </li>
                                @endforeach
                            

                            @endforeach
                            

                        </ul>

                    </div>	

                </li>
                                        <!-- Service list -->


                <li>

                    <!-- Step -->
                    <div class="template-component-booking-item-header template-clear-fix">
                        <span>
                            <span>3</span>
                            <span>/</span>
                            <span>4</span>	
                        </span>
                        <h3>Services menu</h3>
                        <h5>A la carte services menu.</h5>
                    </div>

                    <!-- Content -->
                    <div class="template-component-booking-item-content">

                        <!-- Service list -->
                        <ul class="template-component-booking-service-list">
                            @foreach ($plans as $plan)
                                <!-- Service -->
                            <li data-id="addons{{ $plan->id }}" class="template-clear-fix">

                                <!-- Name -->
                                <div class="template-component-booking-service-name">
                                    <span>{{ $plan->name }}</span>					
                                    <a href="#" class="template-component-more-link">
                                        <span>More...</span>
                                        <span>Less...</span>
                                    </a>
                                    <div class="template-component-more-content">
                                        {{ $plan->description }}					
                                    </div>
                                </div>

                                <!-- Duration -->
                                <div class="template-component-booking-service-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-service-duration-value">{{ $plan->duration }}</span>
                                    <span class="template-component-booking-service-duration-unit">min</span>
                                </div>

                                <!-- Price -->
                                <div class="template-component-booking-service-price">
                                    <span class="template-icon-booking-meta-price"></span>
                                    <span class="template-component-booking-service-price-currency">Rs</span>
                                    <span class="template-component-booking-service-price-value">{{ $plan->price }}</span>
                                    {{-- <span class="template-component-booking-service-price-unit">{{ $plan->price }}</span>
                                    <span class="template-component-booking-service-price-decimal">.00</span> --}}
                                </div>

                                <!-- Button -->
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Select</a>
                                </div>

                            </li>
                            @endforeach
                            

                        </ul>

                    </div>

                </li>
                                        <!-- Summary -->


                <li>

                    <!-- Step -->
                    <div class="template-component-booking-item-header template-clear-fix">
                        <span>
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
                                <div class="template-icon-booking-meta-total-duration"></div>
                                <h5>
                                    <span>0</span>
                                    <span>h</span>
                                    &nbsp;
                                    <span>0</span>
                                    <span>min</span>
                                </h5>
                                <span>Duration</span>
                            </li>

                            <!-- Price -->
                            <li class="template-component-booking-summary-price ">
                                <div class="template-icon-booking-meta-total-price"></div>
                                <h5>
                                    <span class="template-component-booking-summary-price-symbol">Rs</span>
                                    <span class="template-component-booking-summary-price-value">0.00</span>
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
                        <ul class="template-layout-50x50 template-layout-margin-reset template-clear-fix">
                            <!-- Booking date -->
                            <li class="template-layout-column-left template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-date">Booking Date *</label>
                                    <input type="text" data-field="datetime" name="booking-form-date" id="booking-form-date"/>
                                </div>
                            </li>
                            <!-- Message -->
                            <li class="template-layout-column-right template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-address">Address *</label>
                                    <textarea rows="1" cols="1" name="booking-form-address" id="booking-form-address"></textarea>
                                </div>						
                            </li>

                        </ul>	
                        <div id="map"></div>

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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8gGp4eCFFolHD2ezWhEojkGDF-DhWkVo&callback=initMap&libraries=&v=weekly" async ></script>
<button id="rzp-button1" style="display: none">Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>var options = {    
    "key": "{{ config('razorpay.razor_key') }}",
    "amount": "0",
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
    $('#booking-form-submit').on('click',function () {
        if((Object.keys(userlocation).length)==2){
            var service_data=$("#booking-form-data").val();
            var first_name=$("#booking-form-first-name").val();
            var last_name=$('#booking-form-second-name').val();
            var email=$("#booking-form-email").val();
            var mobile=$("#booking-form-phone").val();
            var booking_date=$("#booking-form-date").val(); 
            var address=$("#booking-form-address").val();
            $.ajax({
                type: "POST",
                url: baseurl+'/ServiceRequest',
                data: {service_data:service_data,userlocation:userlocation,_token:"{{ csrf_token() }}",address:address,bookind_date:booking_date,mobile:mobile,email:email,first_name:first_name,last_name:last_name
                },
                cache: false,
                success: function(result){
                    options.order_id=result.data.order_id;
                    options.amount=result.data.actual_amount*100;
                    console.log("amount",options.amount);
                    options.prefill.name=result.data.first_name+' '+result.data.last_name;
                    options.prefill.email=result.data.email;
                    options.prefill.contact=result.data.mobile;
                    options.notes.address=result.data.address;
                    $("#rzp-button1").click();
                    var rzp1 = new Razorpay(options);
                    rzp1.on('payment.failed', function (response){
                        console.log('failed',response);
                        $.ajax({
                            type: "POST",
                            url: baseurl+'/failedPayment',
                            data: {razorpay_order_id:response.error.metadata.order_id,razorpay_payment_id:response.error.metadata.payment_id,_token:"{{ csrf_token() }}",description:response.error.description,},
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
                    });
                    rzp1.open();
                },
                error:function(error){
                    toastr.error(error.responseJSON.message);
                    console.log('error',error);
                }  
            }); 
            console.log('data',$("#booking-form-data").val(),userlocation); 
        }
        else{
            alert('Please Select your location');
        }
       
    });
</script>
@stop
@section('footer')
@include('layouts.footer')
@endsection