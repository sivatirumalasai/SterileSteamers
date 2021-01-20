@extends('layouts.app')
@section('header')
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
                            <li data-id="{{ $category->name }}">
                                <div>
                                    <!-- Icon -->
                                    <div class="template-icon-vehicle-small-car"></div>				
                                    <!-- Name -->
                                    <div>{{ $category->name }}</div>
                                </div>
                            </li>
                            @endforeach
                            

                            {{-- <!-- Vehicle -->
                            <li data-id="medium-size-car">
                                <div>
                                    <div class="template-icon-vehicle-car-mid-size"></div>					
                                    <div>Medium Size Car</div>
                                </div>
                            </li>

                            <!-- Vehicle -->
                            <li data-id="compact-suv">
                                <div>
                                    <div class="template-icon-vehicle-suv"></div>					
                                    <div>Compact SUV</div>
                                </div>
                            </li>

                            <!-- Vehicle -->
                            <li data-id="minivan">
                                <div>
                                    <div class="template-icon-vehicle-minivan"></div>					
                                    <div>Minivan</div>
                                </div>
                            </li>

                            <!-- Vehicle -->
                            <li data-id="pickup-truck">
                                <div>
                                    <div class="template-icon-vehicle-pickup"></div>					
                                    <div>Pickup Truck</div>
                                </div>
                            </li>

                            <!-- Vehicle -->
                            <li data-id="cargo-truck">
                                <div>
                                    <div class="template-icon-vehicle-truck-mid-size"></div>					
                                    <div>Cargo Truck</div>
                                </div>
                            </li> --}}

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
                                        <span class="template-component-booking-package-price-currency">$</span>
                                        <span class="template-component-booking-package-price-total">{{ $plan->actual_price }}</span>
                                        <span class="template-component-booking-package-price-decimal"></span>
                                    </div>
    
                                    <!-- Duration -->
                                    <div class="template-component-booking-package-duration">
                                        <span class="template-icon-booking-meta-duration"></span>
                                        <span class="template-component-booking-package-duration-value">{{ $plan->duration }}</span>
                                        <span class="template-component-booking-package-duration-unit">min</span>
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
                            
                            {{-- <!-- Package -->
                            <li data-id="basic-hand-wash-2" data-id-vehicle-rel="medium-size-car">

                                <!-- Header -->
                                <h4 class="template-component-booking-package-name">Basic Hand Wash</h4>

                                <!-- Price -->
                                <div class="template-component-booking-package-price">
                                    <span class="template-component-booking-package-price-currency">$</span>
                                    <span class="template-component-booking-package-price-total">17</span>
                                    <span class="template-component-booking-package-price-decimal">95</span>
                                </div>

                                <!-- Duration -->
                                <div class="template-component-booking-package-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-package-duration-value">30</span>
                                    <span class="template-component-booking-package-duration-unit">min</span>
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

                            <!-- Package -->
                            <li data-id="deluxe-wash-1" data-id-vehicle-rel="regular-size-car,compact-suv,minivan,pickup-truck,cargo-truck">
                                <h4 class="template-component-booking-package-name">Deluxe Wash</h4>
                                <div class="template-component-booking-package-price">
                                    <span class="template-component-booking-package-price-currency">$</span>
                                    <span class="template-component-booking-package-price-total">27</span>
                                    <span class="template-component-booking-package-price-decimal">95</span>
                                </div>
                                <div class="template-component-booking-package-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-package-duration-value">45</span>
                                    <span class="template-component-booking-package-duration-unit">min</span>
                                </div>
                                <ul class="template-component-booking-package-service-list">
                                    <li data-id="exterior-hand-wash">Exterior Hand Wash</li>
                                    <li data-id="towel-hand-dry">Towel Hand Dry</li>
                                    <li data-id="wheel-shine">Wheel Shine</li>
                                    <li data-id="tire-dressing">Tire Dressing</li>
                                    <li data-id="windows-in-and-out">Windows In &amp; Out</li>
                                    <li data-id="sealer-hand-wax">Sealer Hand Wax</li>
                                </ul>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Book Now</a>
                                </div>
                            </li>

                            <!-- Package -->
                            <li data-id="deluxe-wash-2" data-id-vehicle-rel="medium-size-car">
                                <h4 class="template-component-booking-package-name">Deluxe Wash</h4>
                                <div class="template-component-booking-package-price">
                                    <span class="template-component-booking-package-price-currency">$</span>
                                    <span class="template-component-booking-package-price-total">30</span>
                                    <span class="template-component-booking-package-price-decimal">95</span>
                                </div>
                                <div class="template-component-booking-package-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-package-duration-value">55</span>
                                    <span class="template-component-booking-package-duration-unit">min</span>
                                </div>
                                <ul class="template-component-booking-package-service-list">
                                    <li data-id="exterior-hand-wash">Exterior Hand Wash</li>
                                    <li data-id="towel-hand-dry">Towel Hand Dry</li>
                                    <li data-id="wheel-shine">Wheel Shine</li>
                                    <li data-id="tire-dressing">Tire Dressing</li>
                                    <li data-id="windows-in-and-out">Windows In &amp; Out</li>
                                    <li data-id="sealer-hand-wax">Sealer Hand Wax</li>
                                </ul>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Book Now</a>
                                </div>
                            </li>

                            <!-- Package -->
                            <li data-id="ultimate-shine-1" data-id-vehicle-rel="regular-size-car,compact-suv,minivan">
                                <h4 class="template-component-booking-package-name">Ultimate Shine</h4>
                                <div class="template-component-booking-package-price">
                                    <span class="template-component-booking-package-price-currency">$</span>
                                    <span class="template-component-booking-package-price-total">40</span>
                                    <span class="template-component-booking-package-price-decimal">45</span>
                                </div>
                                <div class="template-component-booking-package-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-package-duration-value">60</span>
                                    <span class="template-component-booking-package-duration-unit">min</span>
                                </div>
                                <ul class="template-component-booking-package-service-list">
                                    <li data-id="exterior-hand-wash">Exterior Hand Wash</li>
                                    <li data-id="towel-hand-dry">Towel Hand Dry</li>
                                    <li data-id="wheel-shine">Wheel Shine</li>
                                    <li data-id="tire-dressing">Tire Dressing</li>
                                    <li data-id="windows-in-and-out">Windows In &amp; Out</li>
                                    <li data-id="sealer-hand-wax">Sealer Hand Wax</li>
                                    <li data-id="interior-vacuum">Interior Vacuum</li>
                                    <li data-id="trunk-vacuum">Trunk Vacuum</li>
                                    <li data-id="door-shuts-and-plastics">Door Shuts &amp; Plastics</li>
                                    <li data-id="dashboard-clean">Dashboard Clean</li>
                                </ul>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Book Now</a>
                                </div>
                            </li>

                            <!-- Package -->
                            <li data-id="ultimate-shine-2" data-id-vehicle-rel="medium-size-car">
                                <h4 class="template-component-booking-package-name">Ultimate Shine</h4>
                                <div class="template-component-booking-package-price">
                                    <span class="template-component-booking-package-price-currency">$</span>
                                    <span class="template-component-booking-package-price-total">52</span>
                                    <span class="template-component-booking-package-price-decimal">95</span>
                                </div>
                                <div class="template-component-booking-package-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-package-duration-value">80</span>
                                    <span class="template-component-booking-package-duration-unit">min</span>
                                </div>
                                <ul class="template-component-booking-package-service-list">
                                    <li data-id="exterior-hand-wash">Exterior Hand Wash</li>
                                    <li data-id="towel-hand-dry">Towel Hand Dry</li>
                                    <li data-id="wheel-shine">Wheel Shine</li>
                                    <li data-id="tire-dressing">Tire Dressing</li>
                                    <li data-id="windows-in-and-out">Windows In &amp; Out</li>
                                    <li data-id="sealer-hand-wax">Sealer Hand Wax</li>
                                    <li data-id="interior-vacuum">Interior Vacuum</li>
                                    <li data-id="trunk-vacuum">Trunk Vacuum</li>
                                    <li data-id="door-shuts-and-plastics">Door Shuts &amp; Plastics</li>
                                    <li data-id="dashboard-clean">Dashboard Clean</li>
                                </ul>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Book Now</a>
                                </div>
                            </li>

                            <!-- Package -->
                            <li data-id="platinium-works-1" data-id-vehicle-rel="regular-size-car">
                                <h4 class="template-component-booking-package-name">Platinum Works</h4>
                                <div class="template-component-booking-package-price">
                                    <span class="template-component-booking-package-price-currency">$</span>
                                    <span class="template-component-booking-package-price-total">65</span>
                                    <span class="template-component-booking-package-price-decimal">95</span>
                                </div>
                                <div class="template-component-booking-package-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-package-duration-value">100</span>
                                    <span class="template-component-booking-package-duration-unit">min</span>
                                </div>
                                <ul class="template-component-booking-package-service-list">
                                    <li data-id="exterior-hand-wash">Exterior Hand Wash</li>
                                    <li data-id="towel-hand-dry">Towel Hand Dry</li>
                                    <li data-id="wheel-shine">Wheel Shine</li>
                                    <li data-id="tire-dressing">Tire Dressing</li>
                                    <li data-id="windows-in-and-out">Windows In &amp; Out</li>
                                    <li data-id="sealer-hand-wax">Sealer Hand Wax</li>
                                    <li data-id="interior-vacuum">Interior Vacuum</li>
                                    <li data-id="trunk-vacuum">Trunk Vacuum</li>
                                    <li data-id="door-shuts-and-plastics">Door Shuts &amp; Plastics</li>
                                    <li data-id="dashboard-clean">Dashboard Clean</li>
                                    <li data-id="air-freshener">Air Freshener</li>
                                    <li data-id="triple-coat-hand-wax">Triple Coat Hand Wax</li>
                                    <li data-id="exterior-vinyl-protectant">Exterior Vinyl Protectant</li>
                                </ul>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Book Now</a>
                                </div>
                            </li>

                            <!-- Package -->
                            <li data-id="platinium-works-2" data-id-vehicle-rel="medium-size-car">
                                <h4 class="template-component-booking-package-name">Platinum Works</h4>
                                <div class="template-component-booking-package-price">
                                    <span class="template-component-booking-package-price-currency">$</span>
                                    <span class="template-component-booking-package-price-total">82</span>
                                    <span class="template-component-booking-package-price-decimal">95</span>
                                </div>
                                <div class="template-component-booking-package-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-package-duration-value">125</span>
                                    <span class="template-component-booking-package-duration-unit">min</span>
                                </div>
                                <ul class="template-component-booking-package-service-list">
                                    <li data-id="exterior-hand-wash">Exterior Hand Wash</li>
                                    <li data-id="towel-hand-dry">Towel Hand Dry</li>
                                    <li data-id="wheel-shine">Wheel Shine</li>
                                    <li data-id="tire-dressing">Tire Dressing</li>
                                    <li data-id="windows-in-and-out">Windows In &amp; Out</li>
                                    <li data-id="sealer-hand-wax">Sealer Hand Wax</li>
                                    <li data-id="interior-vacuum">Interior Vacuum</li>
                                    <li data-id="trunk-vacuum">Trunk Vacuum</li>
                                    <li data-id="door-shuts-and-plastics">Door Shuts &amp; Plastics</li>
                                    <li data-id="dashboard-clean">Dashboard Clean</li>
                                    <li data-id="air-freshener">Air Freshener</li>
                                    <li data-id="triple-coat-hand-wax">Triple Coat Hand Wax</li>
                                    <li data-id="exterior-vinyl-protectant">Exterior Vinyl Protectant</li>
                                </ul>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Book Now</a>
                                </div>
                            </li> --}}

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

                            <!-- Service -->
                            <li data-id="exterior-hand-wash" class="template-clear-fix">

                                <!-- Name -->
                                <div class="template-component-booking-service-name">
                                    <span>Exterior Hand Wash</span>					
                                    <a href="#" class="template-component-more-link">
                                        <span>More...</span>
                                        <span>Less...</span>
                                    </a>
                                    <div class="template-component-more-content">
                                        We hand wash your paint with a pH neutral shampoo, we remove dirt without damaging paint or trims. Your car&#309;s 
                                        exterior is chamois-dried to prevent water marks forming on the paint and high pressure air is used to remove 
                                        water from panel joins and trim.					
                                    </div>
                                </div>

                                <!-- Duration -->
                                <div class="template-component-booking-service-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-service-duration-value">10</span>
                                    <span class="template-component-booking-service-duration-unit">min</span>
                                </div>

                                <!-- Price -->
                                <div class="template-component-booking-service-price">
                                    <span class="template-icon-booking-meta-price"></span>
                                    <span class="template-component-booking-service-price-currency">$</span>
                                    <span class="template-component-booking-service-price-value"></span>
                                    <span class="template-component-booking-service-price-unit">7</span>
                                    <span class="template-component-booking-service-price-decimal">.95</span>
                                </div>

                                <!-- Button -->
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Select</a>
                                </div>

                            </li>

                            <!-- Service -->
                            <li data-id="towel-hand-dry" class="template-clear-fix">
                                <div class="template-component-booking-service-name">
                                    <span>Towel Hand Dry</span>					
                                    <a href="#" class="template-component-more-link">
                                        <span>More...</span>
                                        <span>Less...</span>
                                    </a>
                                    <div class="template-component-more-content">
                                        Your car’s exterior is chamois-dried to prevent water marks forming on the paint and high pressure air is used 
                                        to remove water from panel joins and trim.				
                                    </div>
                                </div>
                                <div class="template-component-booking-service-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-service-duration-value">10</span>
                                    <span class="template-component-booking-service-duration-unit">min</span>
                                </div>
                                <div class="template-component-booking-service-price">
                                    <span class="template-icon-booking-meta-price"></span>
                                    <span class="template-component-booking-service-price-currency">$</span>
                                    <span class="template-component-booking-service-price-value">5.50</span>
                                </div>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Select</a>
                                </div>
                            </li>

                            <!-- Service -->
                            <li data-id="wheel-shine" class="template-clear-fix">
                                <div class="template-component-booking-service-name">
                                    <span>Wheel Shine</span>				
                                </div>
                                <div class="template-component-booking-service-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-service-duration-value">5</span>
                                    <span class="template-component-booking-service-duration-unit">min</span>
                                </div>
                                <div class="template-component-booking-service-price">
                                    <span class="template-icon-booking-meta-price"></span>
                                    <span class="template-component-booking-service-price-currency">$</span>
                                    <span class="template-component-booking-service-price-value">5.00</span>
                                </div>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Select</a>
                                </div>
                            </li>

                            <!-- Service -->
                            <li data-id="tire-dressing" class="template-clear-fix">
                                <div class="template-component-booking-service-name">
                                    <span>Tire Dressing</span>			
                                </div>
                                <div class="template-component-booking-service-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-service-duration-value">5</span>
                                    <span class="template-component-booking-service-duration-unit">min</span>
                                </div>
                                <div class="template-component-booking-service-price">
                                    <span class="template-icon-booking-meta-price"></span>
                                    <span class="template-component-booking-service-price-currency">$</span>
                                    <span class="template-component-booking-service-price-value">2.50</span>
                                </div>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Select</a>
                                </div>
                            </li>

                            <!-- Service -->
                            <li data-id="windows-in-and-out" class="template-clear-fix">
                                <div class="template-component-booking-service-name">
                                    <span>Windows In &amp; Out</span>					
                                    <a href="#" class="template-component-more-link">
                                        <span>More...</span>
                                        <span>Less...</span>
                                    </a>
                                    <div class="template-component-more-content">
                                        We clean the inside of your windscreen and other interior windows. We give special attention to the rear view 
                                        mirror and any vanity mirrors. If you have got a glass sunroof that will be cleaned too.					
                                    </div>
                                </div>
                                <div class="template-component-booking-service-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-service-duration-value">5</span>
                                    <span class="template-component-booking-service-duration-unit">min</span>
                                </div>
                                <div class="template-component-booking-service-price">
                                    <span class="template-icon-booking-meta-price"></span>
                                    <span class="template-component-booking-service-price-currency">$</span>
                                    <span class="template-component-booking-service-price-value">4.25</span>
                                </div>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Select</a>
                                </div>
                            </li>

                            <!-- Service -->
                            <li data-id="sealer-hand-wax" class="template-clear-fix">
                                <div class="template-component-booking-service-name">
                                    <span>Sealer Hand Wax</span>				
                                </div>
                                <div class="template-component-booking-service-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-service-duration-value">0</span>
                                    <span class="template-component-booking-service-duration-unit">min</span>
                                </div>
                                <div class="template-component-booking-service-price">
                                    <span class="template-icon-booking-meta-price"></span>
                                    <span class="template-component-booking-service-price-currency">$</span>
                                    <span class="template-component-booking-service-price-value">4.95</span>
                                </div>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Select</a>
                                </div>
                            </li>

                            <!-- Service -->
                            <li data-id="interior-vacuum" class="template-clear-fix">
                                <div class="template-component-booking-service-name">
                                    <span>Interior Vacuum</span>					
                                    <a href="#" class="template-component-more-link">
                                        <span>More...</span>
                                        <span>Less...</span>
                                    </a>
                                    <div class="template-component-more-content">
                                        We vacuum your seats, including all the creases in your fabric or leather, carpets and mats. 
                                        We will not miss under your seats.					
                                    </div>
                                </div>
                                <div class="template-component-booking-service-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-service-duration-value">5</span>
                                    <span class="template-component-booking-service-duration-unit">min</span>
                                </div>
                                <div class="template-component-booking-service-price">
                                    <span class="template-icon-booking-meta-price"></span>
                                    <span class="template-component-booking-service-price-currency">$</span>
                                    <span class="template-component-booking-service-price-value">4.95</span>
                                </div>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Select</a>
                                </div>
                            </li>

                            <!-- Service -->
                            <li data-id="trunk-vacuum" class="template-clear-fix">
                                <div class="template-component-booking-service-name">
                                    <span>Trunk Vacuum</span>				
                                </div>
                                <div class="template-component-booking-service-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-service-duration-value">5</span>
                                    <span class="template-component-booking-service-duration-unit">min</span>
                                </div>
                                <div class="template-component-booking-service-price">
                                    <span class="template-icon-booking-meta-price"></span>
                                    <span class="template-component-booking-service-price-currency">$</span>
                                    <span class="template-component-booking-service-price-value">3.50</span>
                                </div>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Select</a>
                                </div>
                            </li>

                            <!-- Service -->
                            <li data-id="door-shuts-and-plastics" class="template-clear-fix">
                                <div class="template-component-booking-service-name">
                                    <span>Door Shuts &amp; Plastics</span>				
                                </div>
                                <div class="template-component-booking-service-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-service-duration-value">5</span>
                                    <span class="template-component-booking-service-duration-unit">min</span>
                                </div>
                                <div class="template-component-booking-service-price">
                                    <span class="template-icon-booking-meta-price"></span>
                                    <span class="template-component-booking-service-price-currency">$</span>
                                    <span class="template-component-booking-service-price-value">4.50</span>
                                </div>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Select</a>
                                </div>
                            </li>

                            <!-- Service -->
                            <li data-id="dashboard-clean" class="template-clear-fix">
                                <div class="template-component-booking-service-name">
                                    <span>Dashboard Clean</span>				
                                </div>
                                <div class="template-component-booking-service-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-service-duration-value">5</span>
                                    <span class="template-component-booking-service-duration-unit">min</span>
                                </div>
                                <div class="template-component-booking-service-price">
                                    <span class="template-icon-booking-meta-price"></span>
                                    <span class="template-component-booking-service-price-currency">$</span>
                                    <span class="template-component-booking-service-price-value">5.50</span>
                                </div>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Select</a>
                                </div>
                            </li>

                            <!-- Service -->
                            <li data-id="air-freshener" class="template-clear-fix">
                                <div class="template-component-booking-service-name">
                                    <span>Air Freshener</span>				
                                </div>
                                <div class="template-component-booking-service-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-service-duration-value">0</span>
                                    <span class="template-component-booking-service-duration-unit">min</span>
                                </div>
                                <div class="template-component-booking-service-price">
                                    <span class="template-icon-booking-meta-price"></span>
                                    <span class="template-component-booking-service-price-currency">$</span>
                                    <span class="template-component-booking-service-price-value">1.50</span>
                                </div>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Select</a>
                                </div>
                            </li>

                            <!-- Service -->
                            <li data-id="triple-coat-hand-wax" class="template-clear-fix">
                                <div class="template-component-booking-service-name">
                                    <span>Triple Coat Hand Wax</span>				
                                </div>
                                <div class="template-component-booking-service-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-service-duration-value">30</span>
                                    <span class="template-component-booking-service-duration-unit">min</span>
                                </div>
                                <div class="template-component-booking-service-price">
                                    <span class="template-icon-booking-meta-price"></span>
                                    <span class="template-component-booking-service-price-currency">$</span>
                                    <span class="template-component-booking-service-price-value">17.95</span>
                                </div>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Select</a>
                                </div>
                            </li>

                            <!-- Service -->
                            <li data-id="exterior-vinyl-protectant" class="template-clear-fix">
                                <div class="template-component-booking-service-name">
                                    <span>Exterior Vinyl Protectant</span>				
                                </div>
                                <div class="template-component-booking-service-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-service-duration-value">5</span>
                                    <span class="template-component-booking-service-duration-unit">min</span>
                                </div>
                                <div class="template-component-booking-service-price">
                                    <span class="template-icon-booking-meta-price"></span>
                                    <span class="template-component-booking-service-price-currency">$</span>
                                    <span class="template-component-booking-service-price-value">5.25</span>
                                </div>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Select</a>
                                </div>
                            </li>

                            <!-- Service -->
                            <li data-id="rain-x-complete" class="template-clear-fix">
                                <div class="template-component-booking-service-name">
                                    <span>Rain-X Complete</span>					
                                    <a href="#" class="template-component-more-link">
                                        <span>More...</span>
                                        <span>Less...</span>
                                    </a>
                                    <div class="template-component-more-content">
                                        Rain-X Complete is a surface protectant designed to add premium shine, protection and water repellency to glass, 
                                        paint, trim and chrome. After 24 hours Rain-X Complete actually cures onto the surfaces of your vehicle for 
                                        better adhesion and enhanced protection.					
                                    </div>
                                </div>
                                <div class="template-component-booking-service-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-service-duration-value">5</span>
                                    <span class="template-component-booking-service-duration-unit">min</span>
                                </div>
                                <div class="template-component-booking-service-price">
                                    <span class="template-icon-booking-meta-price"></span>
                                    <span class="template-component-booking-service-price-currency">$</span>
                                    <span class="template-component-booking-service-price-value">4.75</span>
                                </div>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Select</a>
                                </div>
                            </li>

                            <!-- Service -->
                            <li data-id="engine-steam-clean" class="template-clear-fix">
                                <div class="template-component-booking-service-name">
                                    <span>Engine Steam Clean</span>				
                                </div>
                                <div class="template-component-booking-service-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-service-duration-value">30</span>
                                    <span class="template-component-booking-service-duration-unit">min</span>
                                </div>
                                <div class="template-component-booking-service-price">
                                    <span class="template-icon-booking-meta-price"></span>
                                    <span class="template-component-booking-service-price-currency">$</span>
                                    <span class="template-component-booking-service-price-value">39.95</span>
                                </div>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Select</a>
                                </div>
                            </li>

                            <!-- Service -->
                            <li data-id="paint-protection" class="template-clear-fix">
                                <div class="template-component-booking-service-name">
                                    <span>Paint Protection</span>					
                                    <a href="#" class="template-component-more-link">
                                        <span>More...</span>
                                        <span>Less...</span>
                                    </a>
                                    <div class="template-component-more-content">
                                        Paint Protection helps preserve a car&#039;s original manufacturers paint. 
                                        Using our high quality paint&nbsp;protectant can give your exterior the added strength, preserving it 
                                        that glow and shine over many years to come.
                                    </div>
                                </div>
                                <div class="template-component-booking-service-duration">
                                    <span class="template-icon-booking-meta-duration"></span>
                                    <span class="template-component-booking-service-duration-value">180</span>
                                    <span class="template-component-booking-service-duration-unit">min</span>
                                </div>
                                <div class="template-component-booking-service-price">
                                    <span class="template-icon-booking-meta-price"></span>
                                    <span class="template-component-booking-service-price-currency">$</span>
                                    <span class="template-component-booking-service-price-value">350.00</span>
                                </div>
                                <div class="template-component-button-box">
                                    <a href="#" class="template-component-button">Select</a>
                                </div>
                            </li>

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
                                    <span class="template-component-booking-summary-price-symbol">$</span>
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
@stop
@section('footer')
@include('layouts.footer')
@endsection