@extends('layouts.app')
@section('header')
@include('layouts.header')
@stop
@section('content')
				<!-- Header -->
				<div class="template-header template-header-background template-header-background-1">			
		
					<div class="template-header-bottom">
					
						<div class="template-main">

							<div class="template-header-bottom-page-title">
								<h1>Contact style 1</h1>
							</div>

							<div class="template-header-bottom-page-breadcrumb">
								<a href="index.html">Home</a><span class="template-icon-meta-arrow-right-12"></span><a href="#">Contact style 1</a>
							</div>
						
						</div>

					</div>
						
				</div>

				<!-- Content -->
				<div class="template-content">
					
					<!-- Section -->
					<div class="template-section template-section-padding-1 template-main template-clear-fix">
						
						<!-- Features list -->
						<div class="template-component-feature-list template-component-feature-list-position-left template-clear-fix">
							
							<!-- Layout 33x33x33% -->
							<ul class="template-layout-33x33x33 template-clear-fix">
								
								<!-- Left column -->
								<li class="template-layout-column-left">
									<span class="template-icon-feature-phone-circle"></span>
									<h5>Call Us At</h5>
									<p>
										(+505) 122 225 225<br/>
										(+505) 122 225 224<br/>
									</p>
								</li>
								
								<!-- Center column -->
								<li class="template-layout-column-center">
									<span class="template-icon-feature-location-map"></span>
									<h5>Our Address</h5>
									<p>
										464 Rhode Island Av.<br/>
										Portland, OR 97219
									</p>
								</li>
								
								<!-- Right column -->
								<li class="template-layout-column-right">
									<span class="template-icon-feature-clock"></span>
									<h5>Working hours</h5>
									<p>
										Monday - Friday: 8 am - 6 pm<br/>
										Saturday: 8 am - 3 pm
									</p>
								</li>
								
							</ul>
							
						</div>
						
					</div>
					
					<!-- Section -->
					<div class="template-section template-padding-reset template-main template-clear-fix">
						
						<!-- Contact form -->
						<form name="contact-form" id="contact-form" method="POST" action="#" class="template-component-contact-form">
							
							<!-- Layout 50x50% -->
							<ul class="template-layout-50x50 template-layout-margin-reset template-clear-fix">
								
								<!-- Left column -->
								<li class="template-layout-column-left template-margin-bottom-reset">
									<div class="template-component-form-field template-state-block">
										<label for="contact-form-name">Your Name *</label>
										<input type="text" name="contact-form-name" id="contact-form-name"/>
									</div>
									<div class="template-component-form-field template-state-block">
										<label for="contact-form-email">Your E-mail *</label>
										<input type="text" name="contact-form-email" id="contact-form-email"/>
									</div>
									<div class="template-component-form-field template-state-block">
										<label for="contact-form-phone">Phone Number</label>
										<input type="text" name="contact-form-phone" id="contact-form-phone"/>
									</div>
								</li>
								
								<!-- Right column -->
								<li class="template-layout-column-right template-margin-bottom-reset">
									<div class="template-component-form-field template-state-block">
										<label for="contact-form-message">Message *</label>
										<textarea rows="1" cols="1" name="contact-form-message" id="contact-form-message"></textarea>
									</div>
								</li>
								
							</ul>
							
							<!-- Button -->
							<div class="template-align-center template-clear-fix template-margin-top-1">
								<span class="template-state-block">
									<input type="submit" value="Submit Message" class="template-component-button" name="contact-form-submit" id="contact-form-submit"/>
								</span>
							</div>
							
						</form>
						
						<!-- Space -->
						<div class="template-component-space template-component-space-4"></div>
						
					</div>
					
					<!-- Google Maps -->
					<div class="template-section template-section-padding-reset template-clear-fix">
									
						<!-- Google Map -->
						<div class="template-component-google-map">

							<!-- Content -->
							<div class="template-component-google-map-box">
								<div class="template-component-google-map-box-content"></div>
							</div>

							<!-- Button -->
							<a href="#" class="template-component-google-map-button">
								<span class="template-icon-meta-marker"></span>
								<span class="template-component-google-map-button-label-show">Show Map</span>
								<span class="template-component-google-map-button-label-hide">Hide Map</span>
							</a>

						</div>

						<script type="text/javascript">

							jQuery(document).ready(function()
							{
								jQuery('.template-component-google-map').templateGoogleMap(
								{
									coordinate		:
									{
										lat			:	'-37.823952',
										lng			:	'144.958766'
									},
									dimension		:
									{
										width		:	'100%',
										height		:	'400px'
									},
									marker			:	'media/image/map_pointer.png'
								});
							});

						</script>					
					
					</div>
					
				</div>
				
				<!-- Footer -->
				<div class="template-footer">
					
					<div class="template-main">
						
						<!-- Footer top -->
						<div class="template-footer-top">
							
							<!-- Layout 25x25x25x25 -->
							<div class="template-layout-25x25x25x25 template-clear-fix">
								
								<!-- Left column -->
								<div class="template-layout-column-left">
									<h6>About</h6>
									<p>Autospan Hand Wash is an eco-friendly hand car wash and detailing service based in Portland.</p>
									<img src="media/image/logo.png" alt="" class="template-logo" />
								</div>

								<!-- Center left column -->
								<div class="template-layout-column-center-left">
									<h6>Services</h6>
									<ul class="template-list-reset">
										<li><a href="service-style-1.html">Exterior Hand Wash</a></li>
										<li><a href="service-style-1.html">Tower Hand Dry</a></li>
										<li><a href="service-style-1.html">Tire Dressing</a></li>
										<li><a href="service-style-1.html">Wheel Shine</a></li>
										<li><a href="service-style-1.html">Interior Vacuum</a></li>
										<li><a href="service-style-1.html">Sealer Hand Wax</a></li>
									</ul>									
								</div>
								
								<!-- Center right column -->
								<div class="template-layout-column-center-right">
									<h6>Company</h6>
									<ul class="template-list-reset">
										<li><a href="about-style-1.html">About Us</a></li>
										<li><a href="gallery.html">Gallery</a></li>
										<li><a href="service-style-2.html">Our Services</a></li>
										<li><a href="book-your-wash.html">Book Your Wash</a></li>
										<li><a href="gallery.html">Portfolio</a></li>
										<li><a href="contact-style-1.html">Contact</a></li>
									</ul>
								</div>
								
								<!-- Right column -->
								<div class="template-layout-column-right">
									<h6>Newsletter</h6>
									<form class="template-component-newsletter-form">
										<div class="template-component-form-field">
											<label for="newsletter-form-email">Your e-mail address *</label>
											<input type="text" name="newsletter-form-email" id="newsletter-form-email"/>
										</div>
										<div class="template-margin-top-2">
											<input type="submit" value="Subscribe" class="template-component-button" name="newsletter-form-submit" id="newsletter-form-submit"/>
										</div>
									</form>
								</div>
								
							</div>
							
						</div>
@stop
@section('footer')
@include('layouts.footer')
@endsection