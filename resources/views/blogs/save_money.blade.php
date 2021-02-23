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
            <h2>Save Money</h2>
            <div></div>
            <span>Simplify Operations, Reduce Costs and Expand Services</span>
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
                    <h2>Simplify Your Operations</h2>
                    <div></div>
                    {{-- <span>Simplify Operations, Reduce Costs and Expand Services</span> --}}
                </div>
                
                <!-- Text -->
                <p class="template-padding-reset">
                    The Optima Steamer saves you valuable time and unnecessary stress by providing you all the solutions to your deep cleaning, stain-removing, sanitizing, and versatile detailing needs. Without the need for chemicals and additional appliances, the revolutionary Optima Steamer encompasses the very essence of efficiency and versatility.
                    <br>
                    In most mobile wash business set-ups, the Optima Steamer can eliminate the need of the following: pressure washer, generator above 500 kva, air compressor, wash mat, water reclamation system, over-sized water tank, waste tank, and most chemicals for degreasing, washing and rinsing.

                </p>
                
                <!-- Space -->
                
                <!-- Button -->
                {{-- <a href="book-your-wash.html" class="template-component-button">Book Appointment</a> --}}
                
            </div>

            <!-- Right column -->
            <div class="template-background-image template-background-image-3" style="background-image: url('../images/Optima-Steamer-DMF-car-cleaning.jpg');background-size: auto;background-repeat: no-repeat;"></div>

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
                <div class="template-component-header-subheader">
                    <h2>Reduce Your Costs</h2>
                    <div></div>
                    {{-- <span>We can deliver the best result</span> --}}
                </div>
                
                <!-- Text -->
                <p class="template-padding-reset">
                    While each Optima cleaning system requires an initial investment, it is able to easily make up for that cost within its first few months of operation. With very little water, diesel and high quality microfiber towels, the Optima is a ready-to-go. The all-in-one system will save you money on water and an abundance of other supplies and chemicals. As you will now have one primary piece of equipment as opposed to multiple pieces, equipment, operations and maintenance costs including fuel will reduce drastically. In addition, it will be able to expand your business model with all of the new services you will be able to offer as a result.

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
                    <h2>Expand Your Services</h2>
                    {{-- <div></div> --}}
                    {{-- <span>A great value services</span> --}}
                </div>
                
                <!-- Text -->
                <p class="template-padding-reset">
                    <ul>
                        <li>Engine Cleaning</li>
                        <li>Upholstery stain removal</li>
                        <li>Rim brake dust removal</li>
                        <li>Deep leather cleaning</li>
                        <li>Deodorizing</li>
                        <li>Chemical-free sanitizing</li>
                      </ul> 
                </p>
                
                <!-- Space -->
                
                <!-- Button -->
                {{-- <a href="book-your-wash.html" class="template-component-button">Book Appointment</a> --}}
                
            </div>

            <!-- Right column -->
            <div class="template-background-image template-background-image-3" style="background-image: url('../images/Optima-Steamer-cleaning-a-boat.jpg');background-size: auto;background-repeat: no-repeat;"></div>

        </div>
        
    </div>
    
</div>
@stop
@section('footer')
@include('layouts.footer')
@endsection