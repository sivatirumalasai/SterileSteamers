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
            <h2>Testimonials</h2>
            <div></div>
            <span>Learn Why Our Customers Love the Optima Steamer™</span>
        </div>		        
    </div>
    
    <!-- Section -->
    <div class="template-section template-section-padding-reset template-clear-fix">
    
        <!-- Flex layout 50x50% -->
        <div class="template-layout-flex template-background-color-1 template-clear-fix">

            <!-- Left column -->
            <div class="template-align-center">

                <!--- Header + subheader -->
                <div class="template-component-header-subheader">
                    <h2>Our Customer Testimonials</h2>
                    <div></div>
                    {{-- <span>Simplify Operations, Reduce Costs and Expand Services</span> --}}
                </div>
                
                <!-- Text -->
                <p class="template-padding-reset">
                    Our customers’ voices speak the loudest and they’re what matters most. Below are just a few customer testimonials telling how the Optima Steamer™ has helped them work smarter, become eco-friendly, expand their business opportunities and make more money.
                    <br>
                    “It is electric, it uses very little water, it gets higher temp, it’s faster … I haven’t found a single thing that’s not a positive.” – Arron Bell, Domaine Drouhin
                    <br>
                    “With steam we’re able to sanitize in about half the time as hot water and we figured we’re using about 30 gallons over the half hour. So, water usage goes considerably down as well.” – Kevin Johnson, 12th & Maple Wine Co.


                </p>
                
                <!-- Space -->
                
                <!-- Button -->
                {{-- <a href="book-your-wash.html" class="template-component-button">Book Appointment</a> --}}
                
            </div>

            <!-- Right column -->
            <div class="template-background-image" >
                <iframe width="451" height="263" src="https://www.youtube.com/embed/ePw7F5ta1tw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

        </div>
        
        <!-- Flex layout 50x50% -->
        <div class="template-layout-flex template-background-color-1 template-clear-fix">

            <!-- Left column -->
            {{-- <div class="template-background-image template-background-image-4" style="background-image: url('../images/Optima-Steamers-DMF-green-blue-red2.jpg');background-size: auto;background-repeat: no-repeat;"></div> --}}
            <div class=" template-background-image-4">
                <iframe width="451" height="263" src="https://www.youtube.com/embed/Mz-N5AMxYjE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <!-- Right column -->
            <div class="template-align-center">
                
                <!-- Header + subheader -->
                {{-- <div class="template-component-header-subheader">
                    <h2>Reduce Your Costs</h2>
                    <div></div>
                    <span>We can deliver the best result</span>
                </div> --}}
                
                <!-- Text -->
                <p class="template-padding-reset">
                “The Optima is an integral part of our business model that is based on convenience and eco-friendly vehicle cleaning. The Optima provides optimum eco-friendly cleaning: no chemicals, only soft water steam to disinfect and clean interiors to a high degree by powering dirt and grim away not only from easy to reach surfaces but especially from hard to reach areas like between seats and consoles in a time saving efficient manner. This equates to profits. The Optima also provides cleaning of child seats to a degree not obtainable with traditional cleaning methods of high moisture hot water extraction, soaps and/or chemicals. This allows Green Steam Mobile Auto SPA to successfully penetrate the young professional vehicle owner/user market and parents with young children vehicle owner/user markets both of which are substantial in size in Madison, Wisconsin and surrounding area.” – Cal H. Stanisch, Green Steam Mobile Auto SPA
                

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
                {{-- <div class="template-component-header-subheader">
                    <h2>Expand Your Services</h2>
                    <div></div>
                    <span>A great value services</span>
                </div> --}}
                
                <!-- Text -->
                <p class="template-padding-reset">
                    “The Optima Steamer is the only commercial grade steamer available on the market that can consistently deliver the power of steam all day long. In my country of Trinidad and Tobago I own and operate a car care centre — from the genesis of my company’s existence the Optima Steamer is what gave us that competitive edge with the unique and efficient cleaning methods. We are able to introduce services that can only be accomplished using the wet and dry steam application that the Optima Steamer is known to deliver. We have now began to broaden our range of services to other sectors, e.g., restaurant and home cleaning. Hats off to the Steamericas’ team for a world class product that is second to none, a well earned 5 stars.” – Garfa Herbert, Heat Wave Restoration Services
                </p>
                
                <!-- Space -->
                
                <!-- Button -->
                {{-- <a href="book-your-wash.html" class="template-component-button">Book Appointment</a> --}}
                
            </div>

            <!-- Right column -->
            <div class="template-background-image ">
                <iframe width="451" height="263" src="https://www.youtube.com/embed/FxkiLY-rM3U" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

        </div>
        
    </div>
    
</div>
@stop
@section('footer')
@include('layouts.footer')
@endsection