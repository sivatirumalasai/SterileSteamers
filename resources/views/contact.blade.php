
		<!DOCTYPE html>

		<html>

			<head>

				<title>Sterile Steamers</title>
				<meta name="keywords" content="" />
				<meta name="description" content="" />		

				<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
				<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

				<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,700,900&amp;subset=latin,latin-ext">
				<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=PT+Serif:700italic,700,400italic&amp;subset=latin,cyrillic-ext,latin-ext,cyrillic">
				
				<link rel="stylesheet" type="text/css" href="style/jquery.qtip.css"/>
				<link rel="stylesheet" type="text/css" href="style/jquery-ui.min.css"/>
				<link rel="stylesheet" type="text/css" href="style/superfish.css"/>
				<link rel="stylesheet" type="text/css" href="style/flexnav.css"/>
				<link rel="stylesheet" type="text/css" href="style/DateTimePicker.min.css"/>
				<link rel="stylesheet" type="text/css" href="style/fancybox/jquery.fancybox.css"/> 
				<link rel="stylesheet" type="text/css" href="style/fancybox/helpers/jquery.fancybox-buttons.css"/>
				<link rel="stylesheet" type="text/css" href="style/revolution/layers.css"/> 
				<link rel="stylesheet" type="text/css" href="style/revolution/settings.css"/> 
				<link rel="stylesheet" type="text/css" href="style/revolution/navigation.css"/> 
				<link rel="stylesheet" type="text/css" href="style/base.css"/> 
				<link rel="stylesheet" type="text/css" href="style/responsive.css"/> 
				
				<script type="text/javascript" src="script/jquery.min.js"></script>

			</head>

			<body class="template-page-contact-style-2">		

				<!-- Header -->
				<div class="template-header template-header-background template-header-background-3">

					<!-- Top header -->
					<div class="template-header-top">

						<!-- Logo -->
						<div class="template-header-top-logo">
							<a href="{{ route('home') }}" title="">
								<img src="media/image/logo.png" width="70" height="70" alt="" class="template-logo"/>
								<img src="media/image/logo_sticky.png"  width="70" height="70" alt="" class="template-logo template-logo-sticky"/>
							</a>
						</div>

						<!-- Menu-->
						<div class="template-header-top-menu template-main">
							<nav>
							
								<!-- Default menu-->
								<div class="template-component-menu-default">
									<ul class="sf-menu">
										<li><a href="{{ route('home') }}" class="template-state-selected">Home</a></li>
										<li style="display: none">
											<a href="#.html">Pages</a>
											<ul>
												<li><a href="about-style-1.html">About Style 1</a></li>
												<li><a href="about-style-2.html">About Style 2</a></li>
												<li><a href="service-style-1.html">Services Style 1</a></li>
												<li><a href="service-style-2.html">Services Style 2</a></li>
												<li><a href="single-service-right-sidebar.html">Single Service</a></li>
												<li><a href="404.html">Page 404</a></li>
											</ul>
										</li>
										<li style="display: none"><a href="book-your-wash.html">Booking</a></li>
										<li style="display: none">
											<a href="#.html">Services</a>
											<ul>
												<li><a href="service-style-1.html">Services Style 1</a></li>
												<li><a href="service-style-2.html">Services Style 2</a></li>
												<li><a href="single-service-right-sidebar.html">Single Service - Right Sidebar</a></li>
												<li><a href="single-service-left-sidebar.html">Single Service - Left Sidebar</a></li>
											</ul>										
										</li>
										<li style="display: none">
											<a href="#.html">Blog</a>
											<ul>
												<li><a href="blog-small-image-right-sidebar.html">Blog Small Image - Right Sidebar</a></li>
												<li><a href="blog-small-image-left-sidebar.html">Blog Small Image - Left Sidebar</a></li>
												<li><a href="blog-large-image-right-sidebar.html">Blog Large Image - Right Sidebar</a></li>
												<li><a href="blog-large-image-left-sidebar.html">Blog Large Image - Left Sidebar</a></li>
												<li><a href="single-post-right-sidebar.html">Single Post - Right Sidebar</a></li>
												<li><a href="single-post-left-sidebar.html">Single Post - Left Sidebar</a></li>
											</ul>
										</li>
										<li style="display: none"><a href="gallery.html">Gallery</a></li>
										<li >
											<a href="{{ route("contact") }}">Contact</a>
											{{-- <ul>
												<li><a href="contact-style-1.html">Contact Style 1</a></li>
												<li><a href="contact-style-2.html">Contact Style 2</a></li>
											</ul> --}}
										</li>
									</ul>
								</div>
								
							</nav>
							<nav>
							
								<!-- Mobile menu-->
								<div class="template-component-menu-responsive">
									<ul class="flexnav">
										<li><a href="#"><span class="touch-button template-icon-meta-arrow-large-tb template-component-menu-button-close"></span>&nbsp;</a></li>
										<li><a href="index.html" class="template-state-selected">Home</a></li>
										<li>
											<a href="#.html">Pages</a>
											<ul>
												<li><a href="about-style-1.html">About Style 1</a></li>
												<li><a href="about-style-2.html">About Style 2</a></li>
												<li><a href="service-style-1.html">Services Style 1</a></li>
												<li><a href="service-style-2.html">Services Style 2</a></li>
												<li><a href="single-service-right-sidebar.html">Single Service</a></li>
												<li><a href="404.html">Page 404</a></li>
											</ul>
										</li>
										<li><a href="book-your-wash.html">Booking</a></li>
										<li>
											<a href="#.html">Services</a>
											<ul>
												<li><a href="service-style-1.html">Services Style 1</a></li>
												<li><a href="service-style-2.html">Services Style 2</a></li>
												<li><a href="single-service-right-sidebar.html">Single Service - Right Sidebar</a></li>
												<li><a href="single-service-left-sidebar.html">Single Service - Left Sidebar</a></li>
											</ul>										
										</li>
										<li>
											<a href="#.html">Blog</a>
											<ul>
												<li><a href="blog-small-image-right-sidebar.html">Blog Small Image - Right Sidebar</a></li>
												<li><a href="blog-small-image-left-sidebar.html">Blog Small Image - Left Sidebar</a></li>
												<li><a href="blog-large-image-right-sidebar.html">Blog Large Image - Right Sidebar</a></li>
												<li><a href="blog-large-image-left-sidebar.html">Blog Large Image - Left Sidebar</a></li>
												<li><a href="single-post-right-sidebar.html">Single Post - Right Sidebar</a></li>
												<li><a href="single-post-left-sidebar.html">Single Post - Left Sidebar</a></li>
											</ul>
										</li>
										<li><a href="gallery.html">Gallery</a></li>
										<li>
											<a href="#.html">Contact</a>
											<ul>
												<li><a href="contact-style-1.html">Contact Style 1</a></li>
												<li><a href="contact-style-2.html">Contact Style 2</a></li>
											</ul>
										</li>
									</ul>							
								</div>
								
							</nav>
							<script type="text/javascript">
								jQuery(document).ready(function($)
								{
									$('.t').templateHeader();
								});
							</script>
						</div>

						<!-- Social icons -->
						<div class="template-header-top-icon-list template-component-social-icon-list-1" style="display: none">
							<ul class="template-component-social-icon-list">
								<li><emplate-header-topa href="https://twitter.com/quanticalabs" class="template-icon-social-twitter" target="_blank"></a></li>
								<li><a href="https://www.facebook.com/QuanticaLabs" class="template-icon-social-facebook" target="_blank"></a></li>
								<li><a href="https://dribbble.com/quanticalabs" class="template-icon-social-dribbble" target="_blank"></a></li>
								<li><a href="book-your-wash.html" class="template-icon-meta-cart"></a></li>
								<li><a href="#" class="template-icon-meta-search"></a></li>
								<li><a href="#" class="template-icon-meta-menu"></a></li>
							</ul>
						</div>

					</div>				
		
					<div class="template-header-bottom">
					
						<div class="template-main">

							<div class="template-header-bottom-page-title">
								<h1>Sterile Steamers</h1>
							</div>

							<div class="template-header-bottom-page-breadcrumb">
								<a href="{{ route('home') }}">Home</a><span class="template-icon-meta-arrow-right-12"></span><a href="#">Contact</a>
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
					
					<!-- Layout Flex -->
					<div class="template-layout-flex template-clear-fix" >

						<!-- Left column -->
						<div class="template-padding-reset">
										
							<!-- Google Map -->
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3807.304298999265!2d78.52953351487646!3d17.39717828807281!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9967766281f9%3A0x9ef552a9e41838df!2sSterile%20Steamers!5e0!3m2!1sen!2sin!4v1604372601137!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
						
						</div>

						<!-- Right column -->
						<div>
							
							<!-- Header -->
							<div class="template-component-header-subheader template-align-left">
								<h4>Leave a messsage</h4>
								<div></div>
							</div>
							
							<!-- Text -->
							<p class="template-padding-reset">
								
							</p>
							
							<!-- Space -->
							<div class="template-component-space template-component-space-2"></div>
							
							<!-- Contact form -->
							<form name="contact-form" id="contact-form" onsubmit="return false" method="POST" action="#" class="template-component-contact-form">

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
							
						</div>

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
									<p>Sterile Steamers Hand Wash is an eco-friendly hand car wash and detailing service based in Portland.</p>
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
										{{-- <li><a href="about-style-1.html">About Us</a></li>
										<li><a href="gallery.html">Gallery</a></li>
										<li><a href="service-style-2.html">Our Services</a></li>
										<li><a href="book-your-wash.html">Book Your Wash</a></li>
										<li><a href="gallery.html">Portfolio</a></li> --}}
										<li><a href="{{ route('contact') }}">Contact</a></li> 
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
						
						<!-- Footer bottom -->
						<div class="template-footer-bottom">
							
							<!-- Social icon list -->
							<ul class="template-component-social-icon-list template-component-social-icon-list-2">
								<li><a href="https://twitter.com/quanticalabs" class="template-icon-social-twitter" target="_blank"></a></li>
								<li><a href="https://www.facebook.com/QuanticaLabs" class="template-icon-social-facebook" target="_blank"></a></li>
								<li><a href="https://dribbble.com/quanticalabs" class="template-icon-social-dribbble" target="_blank"></a></li>
								<li><a href="http://themeforest.net/user/QuanticaLabs/portfolio?ref=quanticalabs" class="template-icon-social-envato" target="_blank"></a></li>
								<li><a href="https://www.behance.net/quanticalabs" class="template-icon-social-behance" target="_blank"></a></li>
								<li><a href="https://www.youtube.com/user/quanticalabs" class="template-icon-social-youtube" target="_blank"></a></li>
							</ul>
							
							<!-- Copyright -->
							<div class="template-footer-bottom-copyright">
								By <a href="#" target="_blank">Sterile Steamers</a> &copy; 2020 <a href="#" target="_blank"></a>
							</div>
							
						</div>
						
					</div>

				</div>

				<!-- Search box -->
				<div class="template-component-search-form">
					<div></div>
					<form>
						<div>
							<input type="search" name="search"/>
							<span class="template-icon-meta-search"></span>
							<input type="submit" name="submit" value=""/>
						</div>
					</form>
				</div>
				
				<!-- Go to top button -->
				<a href="#go-to-top" class="template-component-go-to-top template-icon-meta-arrow-large-tb"></a>
				
				<!-- Wrapper for date picker -->
				<div id="dtBox"></div>
				
				<!-- JS files -->
				<script type="text/javascript" src="script/jquery-ui.min.js"></script>
				<script type="text/javascript" src="script/superfish.min.js"></script>
				<script type="text/javascript" src="script/jquery.easing.js"></script>
				<script type="text/javascript" src="script/jquery.blockUI.js"></script>
				<script type="text/javascript" src="script/jquery.qtip.min.js"></script>
				<script type="text/javascript" src="script/jquery.fancybox.js"></script>
				<script type="text/javascript" src="script/isotope.pkgd.min.js"></script>
				<script type="text/javascript" src="script/jquery.actual.min.js"></script>
				<script type="text/javascript" src="script/jquery.flexnav.min.js"></script>
				<script type="text/javascript" src="script/jquery.waypoints.min.js"></script>
				<script type="text/javascript" src="script/sticky.min.js"></script>
				<script type="text/javascript" src="script/jquery.scrollTo.min.js"></script>
				<script type="text/javascript" src="script/jquery.fancybox-media.js"></script>
				<script type="text/javascript" src="script/jquery.fancybox-buttons.js"></script>
				<script type="text/javascript" src="script/jquery.carouFredSel.packed.js"></script>
				<script type="text/javascript" src="script/jquery.responsiveElement.js"></script>
				<script type="text/javascript" src="script/jquery.touchSwipe.min.js"></script>
				<script type="text/javascript" src="script/DateTimePicker.min.js"></script>
				<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>  
				
				<!-- Revolution Slider files -->
				<script type="text/javascript" src="script/revolution/jquery.themepunch.revolution.min.js"></script>
				<script type="text/javascript" src="script/revolution/jquery.themepunch.tools.min.js"></script>
				<script type="text/javascript" src="script/revolution/extensions/revolution.extension.actions.min.js"></script>
				<script type="text/javascript" src="script/revolution/extensions/revolution.extension.carousel.min.js"></script>
				<script type="text/javascript" src="script/revolution/extensions/revolution.extension.kenburn.min.js"></script>
				<script type="text/javascript" src="script/revolution/extensions/revolution.extension.layeranimation.min.js"></script>
				<script type="text/javascript" src="script/revolution/extensions/revolution.extension.migration.min.js"></script>
				<script type="text/javascript" src="script/revolution/extensions/revolution.extension.navigation.min.js"></script>
				<script type="text/javascript" src="script/revolution/extensions/revolution.extension.parallax.min.js"></script>
				<script type="text/javascript" src="script/revolution/extensions/revolution.extension.slideanims.min.js"></script>
				<script type="text/javascript" src="script/revolution/extensions/revolution.extension.video.min.js"></script>

				<!-- Plugins files -->
				<script type="text/javascript" src="plugin/booking/jquery.booking.js"></script>
				
				<!-- Components files -->
				<script type="text/javascript" src="script/template/jquery.template.tab.js"></script>
				<script type="text/javascript" src="script/template/jquery.template.image.js"></script>
				<script type="text/javascript" src="script/template/jquery.template.helper.js"></script>
				<script type="text/javascript" src="script/template/jquery.template.header.js"></script>
				<script type="text/javascript" src="script/template/jquery.template.counter.js"></script>
				<script type="text/javascript" src="script/template/jquery.template.gallery.js"></script>
				<script type="text/javascript" src="script/template/jquery.template.goToTop.js"></script>
				<script type="text/javascript" src="script/template/jquery.template.fancybox.js"></script>
				<script type="text/javascript" src="script/template/jquery.template.moreLess.js"></script>
				<script type="text/javascript" src="script/template/jquery.template.googleMap.js"></script>
				<script type="text/javascript" src="script/template/jquery.template.accordion.js"></script>
				<script type="text/javascript" src="script/template/jquery.template.searchForm.js"></script>
				<script type="text/javascript" src="script/template/jquery.template.testimonial.js"></script>
				<script type="text/javascript" src="script/public.js"></script>

			</body>
			
		</html>