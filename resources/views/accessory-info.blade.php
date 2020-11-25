@extends('layouts.app')
@section('content')
<!-- Content -->
<div class="template-content">
    
    <!-- Section -->
    <div class="template-section template-section-padding-1 template-clear-fix template-main">
        
        <!-- Layout 50x50% -->
        <div class="template-layout-50x50 template-clear-fix">
            
            <!-- Left column -->
            <div class="template-layout-column-left">
                
                <!-- Header -->
                <div class="template-component-header-subheader template-align-left">
                    <h2>{{ $accessory->name }}</h2>
                    <div></div>
                    <span>{{ $accessory->category }}</span>
                </div>
                
                <!-- Text -->
                <p class="template-padding-reset">
                    {{$accessory->description}}
                </p>
                
                <!-- Space -->
                <div class="template-space template-component-space-1"></div>
                
                
                <h4>Rs. {{ $accessory->actual_price }} /-</h4>                
                <!-- Button -->
                <a href="#" class="template-component-button">Add to Cart</a>
                
            </div>
        
            <div class="template-layout-column-right template-margin-bottom-reset">
                
                <!-- Image -->
				<div class="template-component-image ">
					<div class="">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							
							@foreach(json_decode($accessory->images) as $index=>$product_image) 
							<li data-target="#myCarousel" data-slide-to="{{ $index }}" {{ ($index==0)? 'class="active"':"" }}></li>
							@endforeach
						</ol>
					
						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							@foreach(json_decode($accessory->images) as $index=>$product_image) 
							<div class="item {{ ($index==0)? "active":"" }}">
								<img src="{{url("storage/".$product_image)}}" alt="Los Angeles" style="width:100%;">
							</div>
							@endforeach
						</div>
					
						<!-- Left and right controls -->
						<a class="left carousel-control" href="#myCarousel" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							<span class="sr-only">Next</span>
						</a>
						</div>
					</div>
				</div>
                
            </div>

        </div>
        
    </div>
    

    <!-- Section -->
    <div class="template-section template-section-padding-1 template-clear-fix template-main">
        
        <!-- Header -->
        <div class="template-component-header-subheader">
            <h2>Specifications</h2>
            <div></div>
            <span>{{$accessory->short_description }}</span>
        </div>								
        <div class="template-layout-50x50 template-clear-fix">
            <ul class="template-layout-33x33x33 template-clear-fix">
                <li class="template-layout-column-left">
                    <h5 class="template-margin-top-2">
                        <a href="single-service-right-sidebar.html">
                            Weight- {{ $accessory->weight }}
                        </a>
                    </h5>
                    
                </li>
                <li class="template-layout-column-center">
                    <h5 class="template-margin-top-2">
                        <a href="single-service-center-sidebar.html">
                            Dimensions-{{ $accessory->dimensions }}
                        </a>
                    </h5>
                    
                </li>
                <li class="template-layout-column-right">
                    <h5 class="template-margin-top-2">
                        <a href="single-service-right-sidebar.html">
                    Length- {{ $accessory->length }}
                        </a>
                    </h5>
                </li>
            </ul>
        </div>
        
       
        
    </div>
</div>
@endsection
