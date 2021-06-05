@extends('layouts.app')
@section('header')
@include('layouts.header')
@stop
@section('content')
<!-- Header -->
	<div class="template-header template-header-background template-header-background-1" style="background-image: url('media/image/background-image/2.jpg') !important">			
			
		<div class="template-header-bottom">
		
			<div class="template-main">

				<div class="template-header-bottom-page-title">
					<h1>Contact</h1>
				</div>

				<div class="template-header-bottom-page-breadcrumb">
					<a href="#"></a>
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
										(+91) 7799 776 775<br/>
										(+91) 7799 775 774<br/>
										Info@sterilesteamers.com
									</p>
								</li>
								
								<!-- Center column -->
								<li class="template-layout-column-center">
									<span class="template-icon-feature-location-map"></span>
									<h5>Our Address</h5>
									<p>
									Ravi Shakuntala Complex<br/>
									Ganesh Nagar, Ramanthapur<br/>
									Hyderabad, Telangana 500013
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
					
				</div>
			
	
@stop
@section('footer')
@include('layouts.footer')	
@endsection
