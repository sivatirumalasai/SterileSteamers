@extends('layouts.app')
@section('header')
@include('layouts.header')
@stop
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
					<h2>{{ $product->name }} ({{ $product->code }})</h2>
					<div></div>
					<span>{{ $product->short_description }}</span>
				</div>
				
				<!-- Text -->
				<p class="template-padding-reset">
					{{ $product->description }}
				</p>
				
				<!-- Space -->
				<div class="template-space template-component-space-1"></div>
				
				<!-- List -->
				<ul class="template-component-list" style="display: none">
					<li>
						<span class="template-icon-meta-check"></span>
						We use professional equipment and have a fully trained staff
					</li>
					<li>
						<span class="template-icon-meta-check"></span>
						We make sure our customers are completely satisfied with their service
					</li>
					<li>
						<span class="template-icon-meta-check"></span>
						Professional detailing will increase the <a href="#">resale value of your car</a>
					</li>
					<li>
						<span class="template-icon-meta-check"></span>
						We are a licensed and fully insured company</li>
					<li>
						<span class="template-icon-meta-check"></span>
						Book and pay for your wash <a href="#">electronically and securely</a>
					</li>
					<li>
						<span class="template-icon-meta-check"></span>
						We are very open and easy to reach company
					</li>
				</ul>
				
				<!-- Space -->
				<div class="template-space template-component-space-2"></div>
				
				<!-- Button -->
				<a href="#" class="template-component-button">Add To Cart</a>
				
			</div>
		
			<div class="template-layout-column-right template-margin-bottom-reset">
				
				<!-- Image -->
				<div class="template-component-image ">
					<div class="">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							
							@foreach(json_decode($product->images) as $index=>$product_image) 
							<li data-target="#myCarousel" data-slide-to="{{ $index }}" {{ ($index==0)? 'class="active"':"" }}></li>
							@endforeach
						</ol>
					
						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							@foreach(json_decode($product->images) as $index=>$product_image) 
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
	<div class="template-section template-section-padding-1 template-clear-fix template-background-color-1">
	<!-- Header -->
	<div class="template-component-header-subheader">
		<h2>Product-Features</h2>
	</div>
		<!-- Main -->
		<div class="template-main">
			
			<!-- Layout 50x50 -->
			@php($position='left')
			<div class="template-layout-50x50 template-clear-fix">
				<ul class="template-layout-33x33x33 template-clear-fix">
					@foreach ($features as $feature)
						<!-- Left column -->
						
						@if($position=='left')
							<li class="template-layout-column-left">
							@php($position='center')
						@elseif($position=='center')
							<li class="template-layout-column-center">
							@php($position='right')
						@else
							<li class="template-layout-column-right">
							@php($position='left')
						@endif
						<div class="template-component-image template-component-image-preloader">
							<a href="single-service-right-sidebar.html">
								<img src="{{ Storage::url($feature->image) }}" alt=""/>
								<span class="template-component-image-hover"></span>
							</a>
						</div>
						<h5 class="template-margin-top-2">
							<a href="single-service-right-sidebar.html">
								{{ $feature->name }}
							</a>
						</h5>
						<p class="template-padding-reset">
							{{ $feature->description }}
						</p>
					</li>
					@endforeach
					
					
				</ul>

			</div>
			
		</div>
		
	</div>

	<!-- Section -->
	<div class="template-section template-section-padding-1 template-clear-fix template-main">
		<div class="template-component-header-subheader">
			<h2>Specifications</h2>
			<div></div>
			<span>{{ ($specifications)? $specifications->category: "n/a" }}</span>
			<span>{{ ($specifications)? $specifications->info: "n/a" }}</span>
		</div>
		<!-- Layout 33x33x33% -->
		<div class="template-layout-33x33x33 template-clear-fix">
			
			<!-- Left column -->
			<div class="template-layout-column-left">
				
				<!-- Feature list -->
				<div class="template-component-feature-list template-component-feature-list-position-right">
					<ul class="template-layout-100 template-clear-fix">
						<li class="template-layout-column-left">
							<h5>Electric power (watts)*</h5>
							<p>{{ ($specifications)? $specifications->power: "n/a" }}</p>
						</li>
						<li class="template-layout-column-left">
							<h5>Required voltage*</h5>
							<p>{{ ($specifications)? $specifications->voltage: "n/a" }}</p>
						</li>
						<li class="template-layout-column-left ">
							<h5>Required amperage‡*</h5>
							<p>{{ ($specifications)? $specifications->current: "n/a" }}</p>
						</li>
						<li class="template-layout-column-left ">
							<h5>Boiler vessel capacity</h5>
							<p>{{ ($specifications)? $specifications->boiler_vessel_capacity: "n/a" }}</p>
						</li>
						<li class="template-layout-column-left ">
							<h5>Boiler temperature</h5>
							<p>{{ ($specifications)? $specifications->boiler_temperature: "n/a" }}</p>
						</li>
						<li class="template-layout-column-left ">
							<h5>Sprayer tip temperature</h5>
							<p>{{ ($specifications)? $specifications->sprayer_tip_temperature: "n/a" }}</p>
						</li>
						<li class="template-layout-column-left ">
							<h5>Steam temperature, sprayed‡</h5>
							<p>{{ ($specifications)? $specifications->steam_temperature_sprayed: "n/a" }}</p>
						</li>
						<li class="template-layout-column-left template-margin-bottom-reset">
							<h5>Preheating time‡</h5>
							<p>{{ ($specifications)? $specifications->preheating_time: "n/a" }}</p>
						</li>
						
					</ul>
				</div>
				
			</div>
			
			<!-- Center column -->
			<div class="template-layout-column-center">
				<div class="template-component-feature-list template-component-feature-list-position-right">
					<ul class="template-layout-100 template-clear-fix">
						<li class="template-layout-column-left">
							<h5>Freight dimensions</h5>
							<p>{{ ($specifications)? $specifications->freight_dimensions: "n/a" }}</p>
						</li>
						<li class="template-layout-column-left">
							<h5>Steam capacity</h5>
							<p>{{ ($specifications)? $specifications->steam_capacity: "n/a" }}</p>
						</li>
						<li class="template-layout-column-left">
							<h5>Maximum flow rate</h5>
							<p>{{ ($specifications)? $specifications->max_flow_rate: "n/a" }}</p>
						</li>
						<li class="template-layout-column-left">
							<h5>Water tank capacity</h5>
							<p>{{ ($specifications)? $specifications->water_tank_capacity: "n/a" }}</p>
						</li>
						<li class="template-layout-column-left">
							<h5>Fuel tank capacity</h5>
							<p>{{ ($specifications)? $specifications->fuel_tank_capacity: "n/a" }}</p>
						</li>
						<li class="template-layout-column-left">
							<h5>Fuel consumption</h5>
							<p>{{ ($specifications)? $specifications->fuel_consumption: "n/a" }}</p>
						</li>
						<li class="template-layout-column-left">
							<h5>Steam hose connections</h5>
							<p>{{ ($specifications)? $specifications->steam_hose_connections: "n/a" }}</p>
						</li>
						<li class="template-layout-column-left ">
							<h5>Body materials</h5>
							<p>{{ ($specifications)? $specifications->body_materials: "n/a" }}</p>
						</li>
					</ul>
				</div>
			</div>
			
			<!-- Right column -->
			<div class="template-layout-column-right">
				
				<div class="template-component-feature-list template-component-feature-list-position-right">
					<ul class="template-layout-100 template-clear-fix">
						<li class="template-layout-column-left">
							<h5>BTUs (approximate or equivalent)</h5>
							<p>{{ ($specifications)? $specifications->approximate: "n/a" }}</p>
						</li>
						<li class="template-layout-column-left">
							<h5>Operating pressure</h5>
							<p>{{ ($specifications)? $specifications->operating_pressure: "n/a" }}</p>
						</li>
						<li class="template-layout-column-left">
							<h5>Steam hose/guns included</h5>
							<p>{{ ($specifications)? $specifications->guns_included: "n/a" }}</p>
						</li>
						<li class="template-layout-column-left">
							<h5>Direct water connection</h5>
							<p>{{ ($specifications)? $specifications->direct_water_connection: "n/a" }}</p>
						</li>
						<li class="template-layout-column-left">
							<h5>Product weight, empty</h5>
							<p>{{ ($specifications)? $specifications->product_weight: "n/a" }}</p>
						</li>
						<li class="template-layout-column-left">
							<h5>Product dimensions (L x W x H)</h5>
							<p>{{ ($specifications)? $specifications->product_dimensions: "n/a" }}</p>
						</li>
						<li class="template-layout-column-left ">
							<h5>Maximum pressure</h5>
							<p>{{ ($specifications)? $specifications->maximum_pressure: "n/a" }}</p>
						</li>
						
						<li class="template-layout-column-left template-margin-bottom-reset">
							<h5>Colors available</h5>
							<p>{{ ($specifications)? $specifications->colors_available: "n/a" }}</p>
						</li>
					</ul>
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</div>
@stop
@section('footer')
@include('layouts.footer')	
@endsection
