@extends('layouts.app')
@section('header')
@include('layouts.header')
@stop
@section('content')
<!-- Content -->
<div class="template-content">
					
    <!-- Section -->
    <div class="template-section template-section-padding-1 template-clear-fix template-main">
        
        <!-- Header + subheader -->
        <div class="template-component-header-subheader">
            <h2>Protect the Earth</h2>
            <div></div>
            <span>Conserve Water, Reduce Chemical Use and Eliminate Waste Water Runoff</span>
        </div>		
        
        <!--- Layout 33x33x33% -->
        {{-- <ul class="template-layout-33x33x33 template-clear-fix">
            
            <!-- Left column -->
            <li class="template-layout-column-left">
                <div class="template-component-image template-component-image-preloader">
                    <a href="single-service-right-sidebar.html">
                        <img src="media/image/sample/460x306/image_05.jpg" alt=""/>
                        <span class="template-component-image-hover"></span>
                    </a>
                </div>
                <h5 class="template-margin-top-2">
                    <a href="single-service-right-sidebar.html">
                        Exterior Hand Wash
                    </a>
                </h5>
                <p class="template-padding-reset">Metro tical dotrium est terminal integer forks driven suspendisse une novum etos pellentesque a non felis maecenas magna ligato primus.</p>
            </li>
            
            <!-- Center column -->
            <li class="template-layout-column-center">
                <div class="template-component-image template-component-image-preloader">
                    <a href="single-service-right-sidebar.html">
                        <img src="media/image/sample/460x306/image_06.jpg" alt=""/>
                        <span class="template-component-image-hover"></span>
                    </a>
                </div>
                <h5 class="template-margin-top-2">
                    <a href="single-service-right-sidebar.html">
                        Interior Detailing
                    </a>
                </h5>
                <p class="template-padding-reset">Nulla finibus luctus erat non congue velit fermentum sit amet morbi in velit erat. Quisque ullamcorper exa vitae eros pellentesque eget.</p>
            </li>
            
            <!-- Right column -->
            <li class="template-layout-column-right">
                <div class="template-component-image template-component-image-preloader">
                    <a href="single-service-right-sidebar.html">
                        <img src="media/image/sample/460x306/image_07.jpg" alt=""/>
                        <span class="template-component-image-hover"></span>
                    </a>
                </div>
                <h5 class="template-margin-top-2">
                    <a href="single-service-right-sidebar.html">
                        Preparation For Sale
                    </a>
                </h5>
                <p class="template-padding-reset">Phasellus sit amet egestas ex praesent sollicitudinal mattis lacus non facilisis nunc. Quisque consectetura odio ut sagittis consequat nisl.</p>
            </li>
            
        </ul> --}}
        
    </div>
    
    <!-- Section -->
    <div class="template-section template-section-padding-reset template-clear-fix">
    
        <!-- Flex layout 50x50% -->
        <div class="template-layout-flex template-background-color-1 template-clear-fix">

            <!-- Left column -->
            <div class="template-align-center">

                <!--- Header + subheader -->
                <div class="template-component-header-subheader">
                    <h2>Conserve Water</h2>
                    <div></div>
                    <span>A great value services</span>
                </div>
                
                <!-- Text -->
                <p class="template-padding-reset">
                    For mobile wash operators, the Optima Steamer™ can reduce water consumption by 95%, cleaning a car using as little as one gallon of water. Not only will steam reduce your water consumption and water bill, it will also reduce the equipment and space necessary to contain water. Weight reduction will greatly reduce vehicle fuel consumption. Compared to traditional pressure washer operators who carry over 250 gallons of water (over 2,085lbs) and a recovery tank, Optima Steamer™ users will need no more than 20 gallons of water for all day use with no recovery tank!
                </p>
                
                <!-- Space -->
                
                <!-- Button -->
                {{-- <a href="book-your-wash.html" class="template-component-button">Book Appointment</a> --}}
                
            </div>

            <!-- Right column -->
            <div class="template-background-image template-background-image-3" style="background-image: url('../images/average-water-consumption-comparison.jpg');background-size: auto;background-repeat: no-repeat;"></div>

        </div>
        
        <!-- Flex layout 50x50% -->
        <div class="template-layout-flex template-background-color-1 template-clear-fix">

            <!-- Left column -->
            <div class="template-background-image template-background-image-4" style="background-image: url('../images/Optima-Steamer-cleaning-playground-equipment.jpg');background-size: auto;background-repeat: no-repeat;"></div>

            <!-- Right column -->
            <div class="template-align-center">
                
                <!-- Header + subheader -->
                <div class="template-component-header-subheader">
                    <h2>Reduce Chemical Use</h2>
                    <div></div>
                    {{-- <span>We can deliver the best result</span> --}}
                </div>
                
                <!-- Text -->
                <p class="template-padding-reset">
                    Steam allows a mobile wash operators to drastically reduce their chemical consumption. In fact, steam eliminates your need for window cleaning chemicals, soaps, detergent and other abrasive and harmful compounds. With a moisture control feature, the Optima Steamer™ achieves wet or dry steam. Heat of the steam will break down dirt and grime easily and sanitize any surface without chemical, and gentle yet powerful steam pressure will lift them up from vehicles’ surface. The temperature of steam can be easily controlled by the distance you hold it from the surface, ensuring no damage to surface, especially paint and clear coats!

                </p>
                
                <!-- Space -->
                {{-- <div class="template-component-space template-component-space-2"></div> --}}
                
                <!-- Button -->
                {{-- <a href="book-your-wash.html" class="template-component-button">Book Appointment</a> --}}
                
            </div>

        </div>
         <!-- Flex layout 50x50% -->
         <div class="template-layout-flex template-background-color-1 template-clear-fix">

            <!-- Left column -->
            <div class="template-align-center">

                <!--- Header + subheader -->
                <div class="template-component-header-subheader">
                    <h2>Eliminate Waste Water Runoff</h2>
                    {{-- <div></div> --}}
                    {{-- <span>A great value services</span> --}}
                </div>
                
                <!-- Text -->
                <p class="template-padding-reset">
                    Untreated waste water disposal to ground soil and storm drains impacts the environment. The equipment required for containing wastewater and the cost to maintain it decreases productivity and profit. Using the Optima Steamer™, a mobile wash operator can wash and clean without producing wastewater. Eliminating the need for a wastewater reclamation mat and containment system decreases wash time per car and increases your earning potential.
                    <br>
                    Under the Clean Water Act, the US Environmental Protection Agency (EPA) implemented pollution control programs such as setting wastewater standards for many industries. The EPA also set water quality standards for all contaminants in surface waters. The Clean Water Act made it “unlawful to discharge any pollutant from a point source into navigable waters, unless a permit is obtained.” When in violation, fines may approach $20,000 per day. Using the Optima Steamer™, you will never generate waste water runoff. We have helped thousands of customers bypassing permits and fines and getting ahead by making their business more flexible and eco-friendly.
                    

                </p>
                
                <!-- Space -->
                
                <!-- Button -->
                {{-- <a href="book-your-wash.html" class="template-component-button">Book Appointment</a> --}}
                
            </div>

            <!-- Right column -->
            <div class="template-background-image template-background-image-3" style="background-image: url('../images/Steam-cleaning-versus-pressure-washing.jpg');background-size: auto;background-repeat: no-repeat;"></div>

        </div>
        
    </div>
    
</div>
@stop
@section('footer')
@include('layouts.footer')
@endsection