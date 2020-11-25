
		<!DOCTYPE html>

		<html>

			<head>

				<title>Product-Info</title>
				<meta name="keywords" content="" />
				<meta name="description" content="" />		

				<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
				<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

				<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700italic,700,900&amp;subset=latin,latin-ext">
				<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=PT+Serif:700italic,700,400italic&amp;subset=latin,cyrillic-ext,latin-ext,cyrillic">
				
				<link rel="stylesheet" type="text/css" href="{{ URL::asset('style/jquery.qtip.css') }}"/>
				<link rel="stylesheet" type="text/css" href="{{ URL::asset('style/jquery-ui.min.css') }}"/>
				<link rel="stylesheet" type="text/css" href="{{ URL::asset('style/superfish.css') }}"/>
				<link rel="stylesheet" type="text/css" href="{{ URL::asset('style/flexnav.css') }}"/>
				<link rel="stylesheet" type="text/css" href="{{ URL::asset('style/DateTimePicker.min.css') }}"/>
				<link rel="stylesheet" type="text/css" href="{{ URL::asset('style/fancybox/jquery.fancybox.css') }}"/> 
				<link rel="stylesheet" type="text/css" href="{{ URL::asset('style/fancybox/helpers/jquery.fancybox-buttons.css') }}"/>
				<link rel="stylesheet" type="text/css" href="{{ URL::asset('style/revolution/layers.css') }}"/> 
				<link rel="stylesheet" type="text/css" href="{{ URL::asset('style/revolution/settings.css') }}"/> 
				<link rel="stylesheet" type="text/css" href="{{ URL::asset('style/revolution/navigation.css') }}"/> 
				<link rel="stylesheet" type="text/css" href="{{ URL::asset('style/base.css') }}"/> 
				<link rel="stylesheet" type="text/css" href="{{ URL::asset('style/responsive.css') }}"/> 
				<style>
                   body {
  background-color: #eee;  
}

h1 {
  color: black;
  font-family: "Trebuchet MS", Helvetica, sans-serif;
  margin-bottom: 15px;
  small {
    color: gray;
  }
}

h2 {
  color: black;
  margin-bottom: 15px;
  font-family: "Trebuchet MS", Helvetica, sans-serif;
  font-size: 2em;
}

ul {  
  font-family: "Trebuchet MS", Helvetica, sans-serif;
  color: #222;
}

span.notify {  
  color: darkred;    
  font-size: 1.2em;
}

.events {  
  height: 100px;
  padding: 10px;
  border: 1px solid #aaa;  
  background-color: #fafafa;
  font-family: consolas;
  color: #444;  
  font-size: 10px;
  overflow: auto;
  height: 120px;
  
  p {
    padding: 0;
    margin: 0;    
    font-height: 1em;
  }
}

/********************

/* original div */
#image-slider-frame {
  clear: both;
}

/* generated wrapper div */
#image-slider-1-wrap {
	height: 300px;
	width: 1000px;
	position: relative;  
  border: 4px solid white;
  box-shadow: 0px 0px 5px black;   
  overflow: hidden;
  
   /* generate first frame div */
  .frame-0 {
    position: absolute;
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    z-index: 0;
    width: 100%;
    height: 100%;         
  }
  
  /* Generated third frame div (header text) */  
  .frame-1 {
    position: absolute;
    background-repeat: no-repeat;
    background-position: center center;
    background-size: 100% 100%;
    z-index: 1;
    width: 100%;
    height: 100%;
  }      
}

#image-slider-1-wrap .frame-text {
  z-index: 3;        
  position: absolute;        
  bottom: 10px;    
  width: 100%;                

  h1 {      
    text-align: center;
    font-weight: bold;
    color: #eec;
    font-size: 3em;	
    font-family: "Trebuchet MS", Helvetica, sans-serif;
    text-shadow: 0px 0px 10px rgba(0,0,0,.75);

    small {
      color: rgba(255,255,255,.5);
      font-size: 0.8em;
      margin-left: 10px;
    }
  }
}

// slider buttons: previous, next image and close button
#image-slider-1-wrap {
  button {
    &.btn-prev, 
    &.btn-next,
    &.btn-close {    
      z-index: 2;
      position:absolute;
      width: 30px;
      height: 30px;
      background: rgba(255,255,255,.3);
      border: none;  
      color: black;
      outline: 0;
    }

    &.btn-prev {
      top: 130px;    
      border: none;
      border-radius: 0px 5px 5px 0;
      color: black;
      
      &::after {
        font-family: FontAwesome;
         content:'\f053';
      }
    }

    &.btn-next {
      top: 130px;
      right: 0;   
      border-radius: 5px 0 0 5px; 
      
      &::after {
        font-family: FontAwesome;
        content:'\f054';
      }
    }

    &.btn-close {  
      right: 10px;
      top: 10px;  
      width: 20px;
      height: 20px;  
      padding-top: 0px;
      padding-left: 5px;
      
      &::after {        
         font-family: FontAwesome;
         content:'\f00d';            
      }    
    }      
  }     
  &:hover {
    button.btn-prev, 
    button.btn-next,
    button.btn-close {
      background: rgba(255,255,255,.85); 
    }
  }
}  

// progressbar
 #image-slider-1-wrap {
    .progress {
      z-index: 2;      
      position: absolute;              
      bottom: 5px;
      margin: 0;
      padding: 0;      
      width: 95%;
      margin-left: 2.5%;
      height: 5px;
      background-color: rgba(255,255,255,.3);
      cursor: pointer;
      
      .indicator {
        z-index: 3;
        background-color: white;
        height: 5px;        
        transition: all .2s ease-out,-webkit-transform .2s ease-out;
      }
    }
  }

/**
 ** IMAGE SLIDER 2 **
 **/

/* original div */
#image-slider-2 { 
	display: none;  
}

/* generated wrapper div */
#image-slider-2-wrap {  
	height: 300px;
	width: 400px;
	position: relative;    
  border: 4px solid #888;
  box-shadow: 0px 0px 5px black;   
  
    /* first frame */
  .frame-0 {
    position: absolute;
    background-repeat: no-repeat;
    background-position: center center;
    background-size: cover;
    z-index: 0;
    width: 100%;
    height: 100%;         
  }

  /* second frame */
  .frame-1 {
    position: absolute;
    background-repeat: no-repeat;
    background-position: center center;
    background-size: 100% 100%;
    z-index: 1;
    width: 100%;
    height: 100%;
  }
}

// close button
#image-slider-2-wrap {
  button {        
    &.btn-close {    
      z-index: 2;      
      position:absolute;
      right: 10px;
      top: 10px;  
      width: 25px;
      height: 25px;  
      background: none;
      border: 2px solid rgba(255,255,255,.5);        
      border-radius: 50% 50%;      
      color: rgba(255,255,255,.85);      
      padding: 0;  
      box-shadow: 1 1 5 rgba(0,0,0,.50);      
      text-shadow: 1 1 5 rgba(0,0,0,.50);      
      padding-left: 1px;
      padding-top: 0;   
      outline: 0;
             
      &::after {        
         font-family: FontAwesome;
         content:'\f00d';            
      }
    }   
    
    &.btn-close:hover {  
      background: none; 
      color: white;
    }        
  }       
}

  
 // progressbar and indicator
 #image-slider-2-wrap {
    .progress {
      z-index: 2;      
      position: absolute;        
      right: 3px;
      bottom: 3px;      
      margin: 0;
      padding: 0;      
      height: 50%;
      width: 9px;
      background: rgba(0,0,0,.5);
      
      .indicator {                
        background: rgba(255,255,255,.75);        
        width: 6px;
        margin-left: 2px;
        border: 0;        
        border-radius: 10px 10px;
        transition: all .2s ease-out,-webkit-transform .2s ease-out;        
      }
    }
  }
                </style>
                <script>
                    
                </script>
				<script type="text/javascript" src="{{ URL::asset('script/jquery.min.js') }}"></script>

			</head>

			<body class="template-page-about-style-1">
		
				<!-- Header -->
				<div class="template-header ">

					<!-- Top header -->
					<div class="template-header-top">

						<!-- Logo -->
						<div class="template-header-top-logo">
							<a href="{{ route('home') }}" title="">
								<img src="{{ URL::asset('media/image/logo.png') }}" width="70" height="70" alt="" class="template-logo"/>
								<img src="{{ URL::asset('media/image/logo_sticky.png') }}" width="70" height="70" alt="" class="template-logo template-logo-sticky"/>
							</a>
						</div>

						<!-- Menu-->
						<div class="template-header-top-menu template-main">
							<nav>
							
								<!-- Default menu-->
								<div class="template-component-menu-default">
									<ul class="sf-menu">
										<li><a href="{{ route('home') }}" class="template-state-selected" style="color: #222222 !important">Home</a></li>
										<li >
											<a href="#" style="color: #199CDB !important">Products</a>
											<ul>
												@foreach (App\Models\Product::all() as $product)
												<li><a href="{{ route("product-info",['id'=>$product->code]) }}">{{ $product->name."(".$product->code.')' }}</a></li>	
												@endforeach
												
											</ul>
										</li>
										<li >
											<a href="{{ route("contact") }}" style="color: #222222 !important">Contact</a>
										</li>
									</ul>
								</div>
								
							</nav>
							<nav>
							
								<!-- Mobile menu-->
								<div class="template-component-menu-responsive">
									<ul class="flexnav">
										<li><a href="#"><span class="touch-button template-icon-meta-arrow-large-tb template-component-menu-button-close"></span>&nbsp;</a></li>
										<li><a href="index.html" class="template-state-selected" style="color: #222222 !important">Home</a></li>
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
											<a href="#.html" style="color: #222222 !important">Contact</a>
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
									$('.template-header-top').templateHeader();
								});
							</script>
						</div>

						<!-- Social icons -->
						<div class="template-header-top-icon-list template-component-social-icon-list-1" style="display: none">
							<ul class="template-component-social-icon-list">
								<li><a href="https://twitter.com/quanticalabs" class="template-icon-social-twitter" target="_blank"></a></li>
								<li><a href="https://www.facebook.com/QuanticaLabs" class="template-icon-social-facebook" target="_blank"></a></li>
								<li><a href="https://dribbble.com/quanticalabs" class="template-icon-social-dribbble" target="_blank"></a></li>
								<li><a href="book-your-wash.html" class="template-icon-meta-cart"></a></li>
								<li><a href="#" class="template-icon-meta-search"></a></li>
								<li><a href="#" class="template-icon-meta-menu"></a></li>
							</ul>
						</div>

					</div>										
				</div>

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
								<a href="#" class="template-component-button">Our Services</a>
								
							</div>
						
							<div class="template-layout-column-right template-margin-bottom-reset">
								
								<!-- Image -->
								<div class="template-component-image ">
                                    <div id="image-slider">
                                        <img src="http://rajcsanyizoltan.hu/codepen/nature1.jpg">
                                        <img src="http://rajcsanyizoltan.hu/codepen/nature2.jpg">
                                        <img src="http://rajcsanyizoltan.hu/codepen/nature3.jpg">    
                                        <img src="http://rajcsanyizoltan.hu/codepen/nature4.jpg">    
                                        <img src="http://rajcsanyizoltan.hu/codepen/nature5.jpg">    
                                        <span><h1>First Slider<small>with custom theme</h1></small></span>      
                                      </div>     
                                      

								</div>
								
							</div>

						</div>
						
					</div>
					
					<!-- Section -->
					<div class="template-section template-section-padding-1 template-clear-fix template-background-color-1">
					
						<!-- Main -->
						<div class="template-main">
							
							<!-- Layout 50x50 -->
							<div class="template-layout-50x50 template-clear-fix">

								<!-- Left column -->
								<div class="template-layout-column-left">
									
									<!-- Header -->
									<div class="template-component-header-subheader template-align-left">
										<h4>Popular Questions</h4>
										<div></div>
									</div>		
									
									<!-- Accordion -->
									<div class="template-component-accordion">
										<h6><span>How often should I have my vehicle washed?</span></h6>
										<div>
											<p>
												Metro vehicula est terminal integer. Suspendisse a novum etos pellentesque a non felis maecenas malesuada. 
												Primus elit lectus at felis, malesuada ultricies curabitur a ligula sande novum. Porta an urna, vestibulum commodo.
											</p>
										</div>
										<h6><span>When should I wash off insect residue?</span></h6>
										<div>
											<p>
												Donec nisl nibh vestibulum vel convallis aliquam hendrerit porttitor neque tincidunt nunc tellus. 
												Duis semper dolor non pharetra vulputate nullam dignissim nisl efficitur interdum tempus morbi ultrices lectus at.
											</p>
										</div>
										<h6><span>What kind of car wash should I choose?</span></h6>
										<div>
											<p>
												Vivamus bibendum lacus nec viverra vehicula justo dolor tincidunt neque vel placeri mauris dolor sed magna. 
												Donec purus odio vulputate vitae rhoncus vitae tristique in arcu sed ornare felis nisi.
											</p>
										</div>
										<h6><span>Is a touchless car wash the safest?</span></h6>
										<div>
											<p>
												Mauris aliquet ipsum a luctus pharetra risus purus aliquam nisi quis efficitur est liber non elit ut in ex et sem tristique 
												Suspendisse sit amet sem et dui dapibus accumsan in imperdiet arcu magna.
											</p>
										</div>
									</div>
									
								</div>
						
								<!-- Right column -->
								<div class="template-layout-column-right">
									
									<!-- Header -->
									<div class="template-component-header-subheader template-align-left">
										<h4>Quality of Service</h4>
										<div></div>
									</div>	
									
									<!-- Text -->
									<p class="template-padding-reset">
										Etiam ullamcorper est terminal metro. Suspendisse a novum etos pellentesque a non felis maecenas malesuada. 
										Primus elit lectus at felis, malesuada ultricies, curabitur et ligula sande. Porta an urna, vestibulum commodo a convallis laoreet. 
										Morbi at sinum interdum etos fermentum in laoret nimbus.
									</p>
									
									<!-- Space -->
									<div class="template-component-space template-component-space-1"></div>
									
									<!-- Counter list -->
									<div class="template-component-counter-bar-list">
										<ul>
											<li>
												<h6>Wash At Home</h6>
												<span class="template-value">50 %</span>
											</li>
											<li>
												<h6>Touchless Wash</h6>
												<span class="template-value">60 %</span>
											</li>
											<li>
												<h6>Autospa Hand Wash</h6>
												<span class="template-value">85 %</span>
											</li>
										</ul>
										
									</div>
									
								</div>

							</div>
							
						</div>
						
					</div>
	
					<!-- Section -->
					<div class="template-section template-section-padding-1 template-clear-fix template-main">
						
						<!-- Header -->
						<div class="template-component-header-subheader">
							<h2>Meet Our Team</h2>
							<div></div>
							<span>Meet our skilled crew</span>
						</div>								
						
						<!-- Text -->
						<p class="template-padding-reset template-align-center">
							Our crew members are skilled and fully equiped with equipment and supplies needed that we can deliver the best results.<br/>
							Our goal is to provide our customers with the friendliest, most convenient hand car wash experience possible.
						</p>
						
						<!-- Space -->
						<div class="template-component-space template-component-space-2"></div>
						
						<!-- Team -->
						<div class="template-component-team-list">
							
							<!-- Layout 33x33x33% -->
							<ul class="template-layout-33x33x33 template-clear-fix">
								
								<!-- Left column -->
								<li class="template-layout-column-left">
									
									<!-- Image -->
									<div class="template-component-image template-component-image-preloader">
										<img src="media/image/sample/350x350/image_01.png" alt="" class="template-component-team-list-image"/> 
									</div>
									
									<!-- Name -->
									<h6 class="template-component-team-list-name">
										Mark Whilberg
									</h6>
									
									<!-- Position -->
									<span class="template-component-team-list-position">
										Co-Founder
									</span>
									
									<!-- Divider -->
									<div class="template-component-divider template-component-team-list-divider"></div>
									
									<!-- Description -->
									<p class="template-component-team-list-description">
										Primus elite lectus tical at node porta dosis with terminal forks nulla sande novum fermentum top dolor porta an urna vestibulum commodo.
									</p>
									
									<!-- Divider -->
									<div class="template-component-divider template-component-team-list-divider"></div>
									
									<!-- Social icons list -->
									<ul class="template-component-social-icon-list template-component-social-icon-list-3">
										<li><a href="#" class="template-icon-social-twitter"></a></li>
										<li><a href="#" class="template-icon-social-facebook"></a></li>
										<li><a href="#" class="template-icon-social-pinterest"></a></li>
									</ul>
									
								</li>
								
								<!-- Center column -->
								<li class="template-layout-column-center">
									<div class="template-component-image template-component-image-preloader">
										<img src="media/image/sample/350x350/image_02.png" alt="" class="template-component-team-list-image"/>
									</div>
									<h6 class="template-component-team-list-name">
										Robert Steward
									</h6>
									<span class="template-component-team-list-position">
										General Manager
									</span>
									<div class="template-component-divider template-component-team-list-divider"></div>
									<p class="template-component-team-list-description">
										Donec mattis rhoncus fermentum donec congue lacus sed egestas sodales praesent erat risus iaculis moles vitae scelerisque vel eleifend eu magna.
									</p>
									<div class="template-component-divider template-component-team-list-divider"></div>
									<ul class="template-component-social-icon-list template-component-social-icon-list-3">
										<li><a href="#" class="template-icon-social-angies-list"></a></li>
										<li><a href="#" class="template-icon-social-flickr"></a></li>
										<li><a href="#" class="template-icon-social-envato"></a></li>
									</ul>
								</li>
								
								<!-- Right column -->
								<li class="template-layout-column-right">
									<div class="template-component-image template-component-image-preloader">
										<img src="media/image/sample/350x350/image_03.png" alt="" class="template-component-team-list-image"/> 
									</div>
									<h6 class="template-component-team-list-name">
										Mitch Van Den Bour
									</h6>
									<span class="template-component-team-list-position">
										Wash Expert
									</span>
									<div class="template-component-divider template-component-team-list-divider"></div>
									<p class="template-component-team-list-description">
										Vestibulum sit amet neque mauris donec volutpata vestibulum massa ut ultricies tellus interdum at. In placerat sollicitudin lectus et blandit.
									</p>
									<div class="template-component-divider template-component-team-list-divider"></div>
									<ul class="template-component-social-icon-list template-component-social-icon-list-3">
										<li><a href="#" class="template-icon-social-youtube"></a></li>
										<li><a href="#" class="template-icon-social-behance"></a></li>
										<li><a href="#" class="template-icon-social-dribbble"></a></li>
									</ul>
								</li>
							</ul>
						</div>
						
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
									<img src="{{ URL::asset('media/image/logo.png') }}" alt="" class="template-logo" />
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
								By <a href="http://quanticalabs.com" target="_blank">QuanticaLabs</a> &copy; 2016 <a href="http://themeforest.net/user/QuanticaLabs/portfolio?ref=quanticalabs" target="_blank">Auto Spa Template</a>
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
				<script type="text/javascript" src="{{ URL::asset('script/jquery-ui.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/superfish.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/jquery.easing.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/jquery.blockUI.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/jquery.qtip.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/jquery.fancybox.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/isotope.pkgd.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/jquery.actual.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/jquery.flexnav.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/jquery.waypoints.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/sticky.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/jquery.scrollTo.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/jquery.fancybox-media.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/jquery.fancybox-buttons.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/jquery.carouFredSel.packed.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/jquery.responsiveElement.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/jquery.touchSwipe.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/DateTimePicker.min.js') }}"></script>
				<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>  
				
				<!-- Revolution Slider files -->
				<script type="text/javascript" src="{{ URL::asset('script/revolution/jquery.themepunch.revolution.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/revolution/jquery.themepunch.tools.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/revolution/extensions/revolution.extension.actions.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/revolution/extensions/revolution.extension.carousel.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/revolution/extensions/revolution.extension.kenburn.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/revolution/extensions/revolution.extension.layeranimation.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/revolution/extensions/revolution.extension.migration.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/revolution/extensions/revolution.extension.navigation.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/revolution/extensions/revolution.extension.parallax.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/revolution/extensions/revolution.extension.slideanims.min.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/revolution/extensions/revolution.extension.video.min.js') }}"></script>

				<!-- Plugins files -->
				<script type="text/javascript" src="{{ URL::asset('plugin/booking/jquery.booking.js') }}"></script>
				
				<!-- Components files -->
				<script type="text/javascript" src="{{ URL::asset('script/template/jquery.template.tab.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/template/jquery.template.image.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/template/jquery.template.helper.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/template/jquery.template.header.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/template/jquery.template.counter.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/template/jquery.template.gallery.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/template/jquery.template.goToTop.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/template/jquery.template.fancybox.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/template/jquery.template.moreLess.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/template/jquery.template.googleMap.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/template/jquery.template.accordion.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/template/jquery.template.searchForm.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/template/jquery.template.testimonial.js') }}"></script>
				<script type="text/javascript" src="{{ URL::asset('script/public.js') }}"></script>
                <script type="text/javascript"  src="{{ URL::asset("script/swiper.js") }}"></script>
                <script>
                    const imageList=[];
                    @foreach(json_decode($product->images) as $product_image) 
                        imageList.push('{{url("storage/".$product_image)}}');
                    @endforeach
                </script>
            </body>
			
		</html>