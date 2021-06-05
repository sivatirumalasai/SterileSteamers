@extends('layouts.app')
@section('header')
@include('layouts.header')
@stop
@section('content')
<style>
	.left_right_align{
		float: left;
		width: 48%;
		margin: 0px 2% 0px 0px;
	}
</style>
<!-- Content -->
<div class="template-content">
	<div class="template-header-bottom">
								
		<div id="rev_slider_wrapper" class="rev_slider_wrapper fullwidthbanner-container">
			
			<div id="rev_slider" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.0.7">
				<ul>
					<!-- Slide 1 -->
					<li data-index="slide-1" data-transition="fade" data-slotamount="1" data-easein="default" data-easeout="default" data-masterspeed="500" data-rotate="0" data-delay="6000">
						<!-- Main image -->
						<img src="media/image/slider/slider_01.jpg" alt="slide-1" data-bgfit="cover" data-bgposition="center bottom">
						<!-- Layers -->
						<!-- Layer 01 -->
						<div class="tp-caption tp-resizeme" 
							data-x="['center','center','center','center','center']" data-hoffset="['0','0','0','0','0']" 
							data-y="['middle','middle','middle','middle','middle']" data-voffset="['-120','-105','-91','-33','-36']"
							data-fontsize="['17','17','17','15','14']"
							data-fontweight="['700','700','700','700','900']"
							data-lineheight="['17','17','17','15','27']"
							data-whitespace="['nowrap','nowrap','nowrap','nowrap','normal']"
							data-width="['auto','auto','auto','auto','300']"
							data-height="auto"
							data-basealign="grid"

							data-transform_idle="o:1;"

							data-transform_in="o:1;x:[175%];y:0px;z:0px;s:2000;e:Power4.easeInOut;"
							data-transform_out="o:0;x:0px;y:0px;z:0px;s:1000;e:Power4.easeInOut;"

							data-mask_in="x:[-100%];y:0px;s:inherit;e:inherit;" 
							data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"

							data-start="100"

							data-splitin="none" 
							data-splitout="none" 
							data-responsive_offset="on"
							style="letter-spacing: 2px;"
							>

							WELCOME TO AUTOSPA HAND CAR WASH
						</div>

						<!-- Layer 02 -->
						<div class="tp-caption tp-resizeme" 
							data-x="['center','center','center','center','center']" data-hoffset="['0','0','0','0','0']" 
							data-y="['middle','middle','middle','middle','middle']" data-voffset="['-41','-35','-29','17','26']"
							data-fontsize="['62','55','43','29','22']"
							data-fontweight="['900','900','900','700','700']"
							data-lineheight="['62','55','43','29','32']"
							data-whitespace="['nowrap','nowrap','nowrap','nowrap','normal']"
							data-width="['auto','auto','auto','auto','300']"
							data-height="auto"
							data-basealign="grid"

							data-transform_idle="o:1;"

							data-transform_in="o:1;x:0px;y:[100%];z:0px;s:2000;e:Power4.easeInOut;"
							data-transform_out="o:1;x:0px;y:[100%];z:0px;s:1000;e:Power4.easeInOut;"

							data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
							data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 

							data-start="1000"

							data-splitin="none" 
							data-splitout="none" 
							data-responsive_offset="on"
							style="letter-spacing: 4px;"
							>

							YOUR CAR IS ALWAYS
						</div>

						<!-- Layer 03 -->
						<div class="tp-caption tp-resizeme" 
							data-x="['center','center','center','center','center']" data-hoffset="['0','0','0','0','0']" 
							data-y="['middle','middle','middle','middle','middle']" data-voffset="['41','35','29','60','74']"
							data-fontsize="['62','55','43','29','22']"
							data-fontweight="['900','900','900','700','700']"
							data-lineheight="['62','55','43','29','32']"
							data-whitespace="['nowrap','nowrap','nowrap','nowrap','normal']"
							data-width="['auto','auto','auto','auto','300']"
							data-height="auto"
							data-basealign="grid"

							data-transform_idle="o:1;"

							data-transform_in="o:1;x:0px;y:[100%];z:0px;s:2000;e:Power4.easeInOut;"
							data-transform_out="o:1;x:0px;y:[100%];z:0px;s:1000;e:Power4.easeInOut;"

							data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
							data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 

							data-start="1500"

							data-splitin="none" 
							data-splitout="none" 
							data-responsive_offset="on"
							style="letter-spacing: 4px;"
							>

							IN GREAT HANDS WITH US
						</div>

						<!-- Layer 04 -->
						<div class="tp-caption tp-resizeme" 
							data-x="['center','center','center','center','center']" data-hoffset="['0','0','0','0','0']" 
							data-y="['middle','middle','middle','middle','middle']" data-voffset="['150','137','121','142','165']"
							data-fontsize="['15','15','15','15','15']"
							data-fontweight="['400','400','400','400','400']"
							data-lineheight="['15','15','15','15','15']"
							data-whitespace="['nowrap','nowrap','nowrap','nowrap','nowrap']"
							data-width="['auto','auto','auto','auto','auto']"
							data-height="auto"
							data-basealign="grid"

							data-transform_idle="o:1;"

							data-transform_in="o:1;x:0px;y:[-100%];z:0px;s:1500;e:Power4.easeInOut;"
							data-transform_out="o:1;x:0px;y:[100%];z:0px;s:750;e:Power4.easeInOut;"

							data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
							data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"

							data-start="2500"

							data-splitin="none" 
							data-splitout="none" 
							data-responsive_offset="on"
							>
							<a class="template-component-button template-color-white" href="{{ route('service-info') }}" title="Purchase Template">Book Wash</a>
						</div>
					</li>

					<!-- Slide 2 -->
					<li data-index="slide-2" data-transition="fade" data-slotamount="1" data-easein="default" data-easeout="default" data-masterspeed="500" data-rotate="0" data-delay="6000">
						<!-- Main image -->
						<img src="media/image/slider/slider_02.jpg" alt="slide-2" data-bgfit="cover" data-bgposition="center bottom">
						<!-- Layers -->
						<!-- Layer 01 -->
						<div class="tp-caption tp-resizeme" 
							data-x="['center','center','center','center','center']" data-hoffset="['0','0','0','0','0']" 
							data-y="['middle','middle','middle','middle','middle']" data-voffset="['-120','-105','-91','-33','-36']"
							data-fontsize="['17','17','17','15','14']"
							data-fontweight="['700','700','700','700','900']"
							data-lineheight="['17','17','17','15','27']"
							data-whitespace="['nowrap','nowrap','nowrap','nowrap','normal']"
							data-width="['auto','auto','auto','auto','300']"
							data-height="auto"
							data-basealign="grid"

							data-transform_idle="o:1;"

							data-transform_in="o:1;x:[175%];y:0px;z:0px;s:2000;e:Power4.easeInOut;"
							data-transform_out="o:0;x:0px;y:0px;z:0px;s:1000;e:Power4.easeInOut;"

							data-mask_in="x:[-100%];y:0px;s:inherit;e:inherit;" 
							data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"

							data-start="100"

							data-splitin="none" 
							data-splitout="none" 
							data-responsive_offset="on"
							style="letter-spacing: 2px;"
							>
							FULL SERVICE AND EXTERIOR TREATMENTS
						</div>

						<!-- Layer 02 -->
						<div class="tp-caption tp-resizeme" 
							data-x="['center','center','center','center','center']" data-hoffset="['0','0','0','0','0']" 
							data-y="['middle','middle','middle','middle','middle']" data-voffset="['-41','-35','-29','17','26']"
							data-fontsize="['62','55','43','29','22']"
							data-fontweight="['900','900','900','700','700']"
							data-lineheight="['62','55','43','29','32']"
							data-whitespace="['nowrap','nowrap','nowrap','nowrap','normal']"
							data-width="['auto','auto','auto','auto','300']"
							data-height="auto"
							data-basealign="grid"

							data-transform_idle="o:1;"

							data-transform_in="o:1;x:0px;y:[100%];z:0px;s:2000;e:Power4.easeInOut;"
							data-transform_out="o:1;x:0px;y:[100%];z:0px;s:1000;e:Power4.easeInOut;"

							data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
							data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 

							data-start="1000"

							data-splitin="none" 
							data-splitout="none" 
							data-responsive_offset="on"
							style="letter-spacing: 4px;"
							>

							WE LOVE YOUR CAR
						</div>

						<!-- Layer 03 -->
						<div class="tp-caption tp-resizeme" 
							data-x="['center','center','center','center','center']" data-hoffset="['0','0','0','0','0']" 
							data-y="['middle','middle','middle','middle','middle']" data-voffset="['41','35','29','60','74']"
							data-fontsize="['62','55','43','29','22']"
							data-fontweight="['900','900','900','700','700']"
							data-lineheight="['62','55','43','29','32']"
							data-whitespace="['nowrap','nowrap','nowrap','nowrap','normal']"
							data-width="['auto','auto','auto','auto','300']"
							data-height="auto"
							data-basealign="grid"

							data-transform_idle="o:1;"

							data-transform_in="o:1;x:0px;y:[100%];z:0px;s:2000;e:Power4.easeInOut;"
							data-transform_out="o:1;x:0px;y:[100%];z:0px;s:1000;e:Power4.easeInOut;"

							data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
							data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 

							data-start="1500"

							data-splitin="none" 
							data-splitout="none" 
							data-responsive_offset="on"
							style="letter-spacing: 4px;"
							>

							THE SAME AS YOU DO
						</div>

						<!-- Layer 04 -->
						<div class="tp-caption tp-resizeme" 
							data-x="['center','center','center','center','center']" data-hoffset="['0','0','0','0','0']" 
							data-y="['middle','middle','middle','middle','middle']" data-voffset="['150','137','121','142','165']"
							data-fontsize="['15','15','15','15','15']"
							data-fontweight="['400','400','400','400','400']"
							data-lineheight="['15','15','15','15','15']"
							data-whitespace="['nowrap','nowrap','nowrap','nowrap','nowrap']"
							data-width="['auto','auto','auto','auto','auto']"
							data-height="auto"
							data-basealign="grid"

							data-transform_idle="o:1;"

							data-transform_in="o:1;x:0px;y:[-100%];z:0px;s:1500;e:Power4.easeInOut;"
							data-transform_out="o:1;x:0px;y:[100%];z:0px;s:750;e:Power4.easeInOut;"

							data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
							data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"

							data-start="2500"

							data-splitin="none" 
							data-splitout="none" 
							data-responsive_offset="on"
							>

							<a class="template-component-button template-color-white" href="{{ route('service-info') }}" title="Purchase Template">Book Wash</a>
						</div>
					</li>

					<!-- Slide 3 -->
					<li data-index="slide-3" data-transition="fade" data-slotamount="1" data-easein="default" data-easeout="default" data-masterspeed="500" data-rotate="0" data-delay="6000">
						<!-- Main image -->
						<img src="media/image/slider/slider_03.jpg" alt="slide-3" data-bgfit="cover" data-bgposition="center bottom">
						<!-- Layers -->
						<!-- Layer 01 -->
						<div class="tp-caption tp-resizeme" 
							data-x="['center','center','center','center','center']" data-hoffset="['0','0','0','0','0']" 
							data-y="['middle','middle','middle','middle','middle']" data-voffset="['-120','-105','-91','-33','-36']"
							data-fontsize="['17','17','17','15','14']"
							data-fontweight="['700','700','700','700','900']"
							data-lineheight="['17','17','17','15','27']"
							data-whitespace="['nowrap','nowrap','nowrap','nowrap','normal']"
							data-width="['auto','auto','auto','auto','300']"
							data-height="auto"
							data-basealign="grid"

							data-transform_idle="o:1;"

							data-transform_in="o:1;x:[175%];y:0px;z:0px;s:2000;e:Power4.easeInOut;"
							data-transform_out="o:0;x:0px;y:0px;z:0px;s:1000;e:Power4.easeInOut;"

							data-mask_in="x:[-100%];y:0px;s:inherit;e:inherit;" 
							data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"

							data-start="100"

							data-splitin="none" 
							data-splitout="none" 
							data-responsive_offset="on"
							style="letter-spacing: 2px;"
							>

							FROM EXPRESS DETAIL TO FULL INSIDE & OUT
						</div>

						<!-- Layer 02 -->
						<div class="tp-caption tp-resizeme" 
							data-x="['center','center','center','center','center']" data-hoffset="['0','0','0','0','0']" 
							data-y="['middle','middle','middle','middle','middle']" data-voffset="['-41','-35','-29','17','26']"
							data-fontsize="['62','55','43','29','22']"
							data-fontweight="['900','900','900','700','700']"
							data-lineheight="['62','55','43','29','32']"
							data-whitespace="['nowrap','nowrap','nowrap','nowrap','normal']"
							data-width="['auto','auto','auto','auto','300']"
							data-height="auto"
							data-basealign="grid"

							data-transform_idle="o:1;"

							data-transform_in="o:1;x:0px;y:[100%];z:0px;s:2000;e:Power4.easeInOut;"
							data-transform_out="o:1;x:0px;y:[100%];z:0px;s:1000;e:Power4.easeInOut;"

							data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
							data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 

							data-start="1000"

							data-splitin="none" 
							data-splitout="none" 
							data-responsive_offset="on"
							style="letter-spacing: 4px;"
							>

							DETAILING SERVICES
						</div>

						<!-- Layer 03 -->
						<div class="tp-caption tp-resizeme" 
							data-x="['center','center','center','center','center']" data-hoffset="['0','0','0','0','0']" 
							data-y="['middle','middle','middle','middle','middle']" data-voffset="['41','35','29','60','74']"
							data-fontsize="['62','55','43','29','22']"
							data-fontweight="['900','900','900','700','700']"
							data-lineheight="['62','55','43','29','32']"
							data-whitespace="['nowrap','nowrap','nowrap','nowrap','normal']"
							data-width="['auto','auto','auto','auto','300']"
							data-height="auto"
							data-basealign="grid"

							data-transform_idle="o:1;"

							data-transform_in="o:1;x:0px;y:[100%];z:0px;s:2000;e:Power4.easeInOut;"
							data-transform_out="o:1;x:0px;y:[100%];z:0px;s:1000;e:Power4.easeInOut;"

							data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
							data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" 

							data-start="1500"

							data-splitin="none" 
							data-splitout="none" 
							data-responsive_offset="on"
							style="letter-spacing: 4px;"
							>

							WITH A PERSONAL TOUCH
						</div>

						<!-- Layer 04 -->
						<div class="tp-caption tp-resizeme" 
							data-x="['center','center','center','center','center']" data-hoffset="['0','0','0','0','0']" 
							data-y="['middle','middle','middle','middle','middle']" data-voffset="['150','137','121','142','165']"
							data-fontsize="['15','15','15','15','15']"
							data-fontweight="['400','400','400','400','400']"
							data-lineheight="['15','15','15','15','15']"
							data-whitespace="['nowrap','nowrap','nowrap','nowrap','nowrap']"
							data-width="['auto','auto','auto','auto','auto']"
							data-height="auto"
							data-basealign="grid"

							data-transform_idle="o:1;"

							data-transform_in="o:1;x:0px;y:[-100%];z:0px;s:1500;e:Power4.easeInOut;"
							data-transform_out="o:1;x:0px;y:[100%];z:0px;s:750;e:Power4.easeInOut;"

							data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
							data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"

							data-start="2500"

							data-splitin="none" 
							data-splitout="none" 
							data-responsive_offset="on"
							>

							<a class="template-component-button template-color-white" href="{{ route('service-info') }}" title="Purchase Template">Book Wash</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
		<!--/-->

		<!-- Slider JS -->
		<script type="text/javascript">
		var tpj=jQuery;			
			var revapi4;
			tpj(document).ready(function() {
				if(tpj("#rev_slider").revolution == undefined){
					revslider_showDoubleJqueryError("#rev_slider");
				}else{
					revapi4 = tpj("#rev_slider").show().revolution({
						jsFileLocation:"script/",
						sliderType:"standard",
						sliderLayout:"fullwidth",
						dottedOverlay:"none",
						delay:9000,
						responsiveLevels:[1920,1189,959,767,479],
						gridwidth:[1170,940,750,460,300],
						gridheight:[750,600,550,550,550],
						lazyType:"none",
						navigation: {
							keyboardNavigation:"on",
							mouseScrollNavigation:"off",
							onHoverStop:"on",
							keyboard_direction: "horizontal",
							touch:{
								touchenabled:"on",
								swipe_treshold : 75,
								swipe_min_touches : 1,
								drag_block_vertical:false,
								swipe_direction:"horizontal",
							},
							arrows: {
								style:"preview1",
								enable:true,
								hide_onmobile:true,
								hide_onleave:true,
								hide_delay:200,
								hide_delay_mobile:1500,
								hide_under:0,
								hide_over:9999,
								tmp:'',
								left: {
									h_align:"left",
									v_align:"center",
									h_offset:0,
									v_offset:0,
								},
								right: {
									h_align:"right",
									v_align:"center",
									h_offset:0,
									v_offset:0,
								}
							},
							bullets: {
								style:"preview1",
								enable:true,
								hide_onmobile:true,
								hide_onleave:true,
								hide_delay:200,
								hide_delay_mobile:1500,
								hide_under:0,
								hide_over:9999,
								direction:"horizontal",
								h_align:"center",
								v_align:"bottom",
								space:10,
								h_offset:0,
								v_offset:20,
								tmp:'<span class="tp-bullet-image"></span><span class="tp-bullet-title"></span>'
							},
						},
						shadow:0,
						spinner:"spinner1",
						stopAfterLoops:-1,
						stopAtSlide:-1,
						disableProgressBar: "on",
						shuffle:"off",
						autoHeight:"off",
						hideSliderAtLimit:0,
						hideCaptionAtLimit:0,
						hideAllCaptionAtLilmit:0,
						debugMode:false,
						fallbacks: {
							simplifyAll:"off",
							nextSlideOnWindowFocus:"off",
							disableFocusListener:false,
						}
				});
				}
			}); /*ready*/
		</script>					
	
	</div>
	<!-- Section -->
	<div class="template-section template-section-padding-1 template-clear-fix template-main">
		
		<!-- Header + subheader -->
		<div class="template-component-header-subheader">
			<h2>Who Is Sterile Steamers</h2>
			<div></div>
			<span>Car steam wash &amp; detailling service</span>
		</div>	
		
		<!-- Layout 33x66% -->
		<div class="template-layout-33x66 template-clear-fix">
			
			<!-- Left column -->
			<div class="template-layout-column-left" style="visibility: visible;">
				<img src="{{ URL::asset('media/image/sample/460x678/image_01.jpg') }}" alt=""/>
			</div>
			
			<!-- Right column -->
			<div class="template-layout-column-right" style="visibility: visible;">
				
				<!-- Text -->
				<p class="template-padding-reset">
					Autospa Hand Wash is an eco-friendly, hand car wash and detailing service based in Portland. 
					Our company was founded back in 2005 by a team of experts with more then 10 years of professional car wash experience. 
					We operate three car washes throught Portland area. Our goal is to provide our customers with the friendliest, most convenient 
					hand car wash experience possible. We use the most modern and up-to-date water reclamation modules as a part of our car wash systems. 
					Our products are all biodegradable and eco-friendly.
				</p>
												
				<!-- Feature list -->
				<div class="template-component-feature-list template-component-feature-list-position-top template-clear-fix">
					
					<!-- Layout 50x50% -->
					<ul class="template-layout-50x50 template-clear-fix">
						
						<!-- Left column -->
						<li class="template-layout-column-left template-margin-bottom-reset">
							<div class="template-component-space template-component-space-2"></div>
							<span class="template-icon-feature-water-drop"></span>
							<h5>The Best Car Wash</h5>
							<ul class="template-component-list">
								<li><span class="template-icon-meta-check"></span>We offer multiple services at a great value</li>
								<li><span class="template-icon-meta-check"></span>Multiple car wash locations throughout Portland</li>
								<li><span class="template-icon-meta-check"></span>Biodegradable and eco-friendly products</li>
								<li><span class="template-icon-meta-check"></span>Pay for your wash electronically and securely</li>
								<li><span class="template-icon-meta-check"></span>Trained and skilled car wash crew members</li>
							</ul>
						</li>
						
						<!-- Right column -->
						<li class="template-layout-column-right template-margin-bottom-reset">
							<div class="template-component-space template-component-space-2"></div>
							<span class="template-icon-feature-user-chat"></span>
							<h5>Contacting Us</h5>
							<ul class="template-component-list">
								<li><span class="template-icon-meta-check"></span>We are very open and easy to reach company</li>
								<li><span class="template-icon-meta-check"></span>Our email is checked hourly during the day</li>
								<li><span class="template-icon-meta-check"></span>Book an appointment online under 3 minutes</li>
								<li><span class="template-icon-meta-check"></span>Our tool free number will be answered</li>
								<li><span class="template-icon-meta-check"></span>You can pay online for your appointment</li>
							</ul>											
						</li>
						
					</ul>
					
				</div>
				
			</div>
				
		</div>
		
	</div>
	
	<!-- Section -->
	<div class="template-section template-section-padding-reset template-clear-fix template-background-color-1">
		
		<!-- Call to action -->
		<div class="template-component-call-to-action">
			<div class="template-main">
				<h3>No 1. Car Wash Booking System</h3>
				<a href="#" class="template-component-button">Book Appointment</a>
			</div>
		</div>
		
	</div>
	
	<!-- Section -->
	<div class="template-section template-background-image template-background-image-5 template-background-image-parallax template-color-white template-clear-fix">
		
		<!-- Mian -->
		<div class="template-main">

			<!-- Header + subheader -->
			<div class="template-component-header-subheader">
				<h2>Our Process</h2>
				<div></div>
				<span>We know your time is valuable</span>
			</div>	

			<!-- Space -->							
			<div class="template-component-space template-component-space-1"></div>
			
			<!-- Process list -->							
			<div class="template-component-process-list template-clear-fix">
				
				<!-- Layout 25x25x25x25% -->
				<ul class="template-layout-25x25x25x25 template-clear-fix template-layout-margin-reset">
					
					<!-- Left column -->
					<li class="template-layout-column-left">
						<span class="template-icon-feature-check"></span>
						<h5>1. Booking</h5>
						<span class="template-icon-meta-arrow-large-rl"></span>
					</li>
					
					<!-- Center left column -->
					<li class="template-layout-column-center-left">
						<span class="template-icon-feature-car-check"></span>
						<h5>2. Inspection</h5>
						<span class="template-icon-meta-arrow-large-rl"></span>
					</li>
					
					<!-- Center right column -->
					<li class="template-layout-column-center-right">
						<span class="template-icon-feature-payment"></span>
						<h5>3. Valuation</h5>
						<span class="template-icon-meta-arrow-large-rl"></span>
					</li>
					
					<!-- Right column -->
					<li class="template-layout-column-right">
						<span class="template-icon-feature-vacuum-cleaner"></span>
						<h5>4. Completion</h5>
					</li>
					
				</ul>
				
			</div>
			
		</div>
			
		
	</div>
	
	<!-- Section -->
	<div class="template-section template-section-padding-1 template-clear-fix template-main" style="display: none">
		
		<!-- Header + subheader -->
		<div class="template-component-header-subheader" >
			<h2>Wash Packages</h2>
			<div></div>
			<span>Which wash is the best for your vehicle?</span>
		</div>	
		
		<!-- Booking -->
		<div class="template-component-booking" id="template-booking">

			<form>

				<ul>
					
					<li>

						<!-- Content -->
						<div class="template-component-booking-item-content">

							<!-- Vehicle list -->
							<ul class="template-component-booking-vehicle-list">

								<!-- Vehicle -->
								<li data-id="regular-size-car">

									<div>

										<!-- Icon -->
										<div class="template-icon-vehicle-small-car"></div>					

										<!-- Name -->
										<div>Regular Size Car</div>

									</div>

								</li>

								<!-- Vehicle -->
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
								</li>

							</ul>

						</div>

					</li>											

					<li>

						<!-- Content -->
						<div class="template-component-booking-item-content">

							<!-- Package list -->
							<ul class="template-component-booking-package-list">

								<!-- Package -->
								<li data-id="basic-hand-wash-1" data-id-vehicle-rel="regular-size-car,compact-suv,minivan,pickup-truck,cargo-truck">

									<!-- Header -->
									<h4 class="template-component-booking-package-name">Basic Hand Wash</h4>

									<!-- Price -->
									<div class="template-component-booking-package-price">
										<span class="template-component-booking-package-price-currency">$</span>
										<span class="template-component-booking-package-price-total">15</span>
										<span class="template-component-booking-package-price-decimal">95</span>
									</div>

									<!-- Duration -->
									<div class="template-component-booking-package-duration">
										<span class="template-icon-booking-meta-duration"></span>
										<span class="template-component-booking-package-duration-value">25</span>
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
										<a href="book-your-wash.html" class="template-component-button">Book Now</a>
									</div>

								</li>

								<!-- Package -->
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
										<a href="book-your-wash.html" class="template-component-button">Book Now</a>
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
										<a href="book-your-wash.html" class="template-component-button">Book Now</a>
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
										<a href="book-your-wash.html" class="template-component-button">Book Now</a>
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
										<a href="book-your-wash.html" class="template-component-button">Book Now</a>
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
										<a href="book-your-wash.html" class="template-component-button">Book Now</a>
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
										<a href="book-your-wash.html" class="template-component-button">Book Now</a>
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
										<a href="book-your-wash.html" class="template-component-button">Book Now</a>
									</div>
								</li>

							</ul>

						</div>	

					</li>
										
				</ul>

			</form>

		</div>
		
		<script type="text/javascript">
			jQuery(document).ready(function($)
			{
				$('#template-booking').booking();
			});
		</script>
		
	</div>
	
	<!-- Section -->
	<div class="template-section template-section-padding-reset template-clear-fix">
		
		<!-- Flex layout 50x50% -->
		<div class="template-layout-flex template-background-color-1 template-clear-fix">

			<!-- Left column -->
			<div class="template-background-image template-background-image-1"></div>

			<!-- Right column -->
			<div class="template-section-padding-1">
				
				<!-- Features list -->
				<div class="template-component-feature-list template-component-feature-list-position-top template-clear-fix">
					
					<!-- Layout 50x50% -->
					<ul class="template-layout-25x25 template-clear-fix">
						
						<!-- Left column -->
						<li class="template-layout-column-left left_right_align">
							<span class="template-icon-feature-location-map"></span>
							<h5>Convenience</h5>
							<p>We are dedicated to providing quality service, customer satisfaction at a great value in multiple locations offering convenient hours.</p>
						</li>
						
						<!-- Right column -->
						<li class="template-layout-column-right left_right_align">
							<span class="template-icon-feature-eco-nature"></span>
							<h5>Organic products</h5>
							<p>Our products are eco-friendly and interior products are all organic. We use less than a gallon of water with absolutely zero-waste.</p>											
						</li>
						
						<!-- Left column -->
						<li class="template-layout-column-left left_right_align">
							<span class="template-icon-feature-team"></span>
							<h5>Experienced Team</h5>
							<p>Our crew members are all trained and skilled and fully equiped with equipment and supplies needed that we can deliver the best results.</p>											
						</li>
						
						<!-- Right column -->
						<li class="template-layout-column-right left_right_align">
							<span class="template-icon-feature-spray-bottle"></span>
							<h5>Great Value</h5>
							<p>We offer multiple services at a great value to meet your needs. We offer a premium service while saving your time and money.</p>											
						</li>
						
					</ul>
					
				</div>

			</div>

		</div>
		
	</div>
	
	<!-- Section -->
	<div class="template-section template-clear-fix template-main" style="display:none">
		
		<!-- Header + subheader -->
		<div class="template-component-header-subheader">
			<h2>Latest Projects</h2>
			<div></div>
			<span>Car wash gallery</span>
		</div>	
		
		<!-- Gallery -->
		<div class="template-component-gallery">

			<!-- Filter buttons list -->
			<ul class="template-component-gallery-filter-list">
				<li><a href="#" class="template-filter-all template-state-selected">All</a></li>
				<li><a href="#" class="template-filter-hand-wash">Hand Wash</a></li>
				<li><a href="#" class="template-filter-auto-detail">Auto Detail</a></li>
				<li><a href="#" class="template-filter-triple-foam">Triple Foam</a></li>
				<li><a href="#" class="template-filter-hand-polish">Hand Polish</a></li>
				<li><a href="#" class="template-filter-hand-wax">Hand Wax</a></li>
			</ul>

			<!-- Images list -->
			<ul class="template-component-gallery-image-list">

				<!-- Image -->
				<li class="template-filter-hand-wash">

					<div class="template-component-image template-component-image-preloader">

						<!-- Orginal image -->
						<a href="media/image/sample/460x678/image_01.jpg" class="template-fancybox" data-fancybox-group="gallery-1">

							<!-- Thumbnail -->
							<img src="media/image/sample/460x678/image_01.jpg" alt=""/>

							<!-- Image hover -->
							<span class="template-component-image-hover">
								<span>
									<span>
										<span class="template-component-image-hover-header">BMW i3</span>
										<span class="template-component-image-hover-divider"></span>
										<span class="template-component-image-hover-subheader">Triple Foam</span>
									</span>
								</span>
							</span>

						</a>

						<!-- Fancybox description -->
						<div class="template-component-image-description">
							Suspendisse sagittis placerat diam sit amet viverra neque elementum et. Donec lacinia in tortor ac tristique. 
							In dui leo bibendum et dignissim non laoreet ut nulla. Nunc vulputate odio a dapibus feugiat tortor velit iaculis libero 
							sit amet euismod lacus elit et enim. Aliquam semper nunc sed rhoncus interdum.
						</div>

					</div>

				</li>

				<!-- Image -->
				<li class="template-filter-auto-detail template-filter-triple-foam">
					<div class="template-component-image template-component-image-preloader">
						<a href="media/image/sample/460x306/image_01.jpg" class="template-fancybox" data-fancybox-group="gallery-1">
							<img src="media/image/sample/460x306/image_01.jpg" alt=""/>
							<span class="template-component-image-hover">
								<span>
									<span>
										<span class="template-component-image-hover-header">Renault Clio</span>
										<span class="template-component-image-hover-divider"></span>
										<span class="template-component-image-hover-subheader">Hand Polish</span>
									</span>
								</span>
							</span>
						</a>
						<div class="template-component-image-description">
							Nam mollis libero at mollis lacinia. Praesent nunc turpis mollis in congue a lacinia at nisl. 
							Quisque tincidunt vehicula dolor a eleifend. In nec tellus eu nisi fringilla molestie ac eu enim. 
							Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque gravida nibh a lobortis blandit risus turpis auctor ligula.
						</div>
					</div>
				</li>

				<!-- Image -->
				<li class="template-filter-hand-wash template-filter-auto-detail template-filter-hand-wax">
					<div class="template-component-image template-component-image-preloader">
						<a href="media/image/sample/460x306/image_02.jpg" class="template-fancybox" data-fancybox-group="gallery-1">
							<img src="media/image/sample/460x306/image_02.jpg" alt=""/>
							<span class="template-component-image-hover">
								<span>
									<span>
										<span class="template-component-image-hover-header">Volkswagen Polo</span>
										<span class="template-component-image-hover-divider"></span>
										<span class="template-component-image-hover-subheader">Interior Dusting</span>
									</span>
								</span>
							</span>
						</a>
						<div class="template-component-image-description">
							Morbi est augue porta in consequat nec pretium eget nunc. In ullamcorper ante quis pharetra finibus. 
							Phasellus tincidunt augue sed velit molestie a pretium neque accumsan. Nam id ligula arcu. Proin non tempus eros. 
							Pellentesque congue libero eget tristique consectetur.
						</div>
					</div>
				</li>

				<!-- Image -->
				<li class="template-component-gallery-image-list-width-2 template-filter-hand-wash template-filter-triple-foam">
					<div class="template-component-image template-component-image-preloader">
						<a href="media/image/sample/760x506/image_06.jpg" class="template-fancybox" data-fancybox-group="gallery-1">
							<img src="media/image/sample/760x506/image_06.jpg" alt=""/>
							<span class="template-component-image-hover">
								<span>
									<span>
										<span class="template-component-image-hover-header">Fiat Bravo</span>
										<span class="template-component-image-hover-divider"></span>
										<span class="template-component-image-hover-subheader">Cleaning Waterless Wash &amp; Wax with Carnauba</span>
									</span>
								</span>
							</span>
						</a>	
						<div class="template-component-image-description">
							Donec eget massa vitae metus maximus tempor. Vivamus maximus mattis ultricies. Sed viverra vitae metus in ornare. 
							Ut lacus massa finibus quis luctus quis faucibus sit amet risus. Ut elit neque pulvinar sit amet ipsum eget feugiat consequat 
							magna. Quisque fringilla ex sit amet rutrum varius velit arcu tempus tellus vitae euismod felis orci vel turpis.
						</div>
					</div>
				</li>

				<!-- Image -->
				<li class="template-filter-triple-foam template-filter-hand-polish">
					<div class="template-component-image template-component-image-preloader">
						<a href="media/image/sample/460x678/image_03.jpg" class="template-fancybox" data-fancybox-group="gallery-1">
							<img src="media/image/sample/460x678/image_03.jpg" alt=""/>
							<span class="template-component-image-hover">
								<span>
									<span>
										<span class="template-component-image-hover-header">BMW Mini Cooper</span>
										<span class="template-component-image-hover-divider"></span>
										<span class="template-component-image-hover-subheader">Wheel Shine</span>
									</span>
								</span>
							</span>
						</a>
						<div class="template-component-image-description">
							Phasellus non commodo dolor. In iaculis eleifend ipsum id lacinia turpis sagittis ut. Ut id vestibulum mauris 
							ac laoreet augue. Nullam malesuada tempor finibus. Aliquam viverra augue ac tincidunt lacinia. Interdum et malesuada fames 
							ac ante ipsum primis in faucibus. Nullam ultricies viverra nulla ac egestas.
						</div>
					</div>
				</li>

				<!-- Image -->
				<li class="template-filter-auto-detail template-filter-hand-polish">
					<div class="template-component-image template-component-image-preloader">
						<a href="media/image/sample/460x306/image_04.jpg" class="template-fancybox" data-fancybox-group="gallery-1">
							<img src="media/image/sample/460x306/image_04.jpg" alt=""/>
							<span class="template-component-image-hover">
								<span>
									<span>
										<span class="template-component-image-hover-header">Mazda 3</span>
										<span class="template-component-image-hover-divider"></span>
										<span class="template-component-image-hover-subheader">Scratch Repair</span>
									</span>
								</span>
							</span>
						</a>
						<div class="template-component-image-description">
							Praesent efficitur tortor sit amet nulla malesuada id venenatis velit sagittis. Aliquam blandit ipsum quis iaculis feugiat. 
							Sed eros lacus aliquet ut libero et faucibus ultricies nisi. Donec hendrerit dignissim ante vel feugiat augue tempor non. 
							Nunc auctor quam sollicitudin est blandit consectetur. Phasellus vitae suscipit purus.
						</div>
					</div>
				</li>

				<!-- Image -->
				<li class="template-filter-triple-foam template-filter-hand-polish template-filter-hand-wax">
					<div class="template-component-image template-component-image-preloader">
						<a href="media/image/sample/460x306/image_10.jpg" class="template-fancybox" data-fancybox-group="gallery-1">
							<img src="media/image/sample/460x306/image_10.jpg" alt=""/>
							<span class="template-component-image-hover">
								<span>
									<span>
										<span class="template-component-image-hover-header">Mercedes A200</span>
										<span class="template-component-image-hover-divider"></span>
										<span class="template-component-image-hover-subheader">Hazy Headlights Restoring</span>
									</span>
								</span>
							</span>
						</a>
						<div class="template-component-image-description">
							Nam et ornare mauris. Nam fringilla eu metus ac vehicula. Mauris dapibus hendrerit ante imperdiet varius orci. 
							Fusce rutrum lobortis erat. Nunc vehicula vehicula risus sit amet cursus. Curabitur non congue magna vel porttitor magna. 
							Duis interdum ligula sed lectus elementum ut interdum neque dignissim.
						</div>
					</div>
				</li>

			</ul>

		</div>	
		
		<!-- Button -->
		<div class="template-align-center">
			<a href="gallery.html" class="template-component-button">Browse More Projects</a>
		</div>
		
	</div>		
	
	<!-- Section -->
	<div class="template-section template-section-padding-reset template-clear-fix">
		
		<!-- Flex layout 50x50% -->
		<div class="template-layout-flex template-clear-fix template-background-color-1">
			
			<!-- Left column -->
			<div>
				
				<!-- Header + subheader -->
				<div class="template-component-header-subheader">
					<h2>Testimonials</h2>
					<div></div>
					<span>Our customers love us</span>
				</div>		
				
				<!-- Space -->		
				<div class="template-component-space template-component-space-2"></div>
				
				<!-- Testimonials list -->							
				<div class="template-component-testimonial-list template-clear-fix">
					
					<!-- Content -->
					<ul class="template-clear-fix">
						<li>
							<p>I could not be happier with the job you did on my car. It looks great. Thank you for your great service and I will continue to refer friends and family to you all.</p>
							<h6>Dotti Newman</h6>
							<span>Audi Q5</span>
						</li>
						<li>
							<p>I think Sterile Steamers is the best car washers ever. Love the price, convenience and customer service. Thanks so much! My car looks like new. I will definitely come again.</p>
							<h6>David Magnus</h6>
							<span>Nissan Titan X5</span>
						</li>
						<li>
							<p>Finally a car wash that does pay attention to the detail. I have a little extra time and money and I let them do the full detail and it always has turned out great.</p>
							<h6>Josh Williams</h6>
							<span>Toyota Avensis</span>
						</li>
					</ul>
					
					<!-- Navigation -->
					<div class="template-component-testimonial-list-navigation">
						<a href="#" class="template-component-testimonial-list-navigation-left template-icon-meta-arrow-large-rl"></a>
						<span class="template-component-testimonial-list-navigation-center template-icon-feature-testimonials"></span>
						<a href="#" class="template-component-testimonial-list-navigation-right template-icon-meta-arrow-large-rl"></a>
					</div>
					
				</div>
				
			</div>
			
			<!-- Right column -->
			<div class="template-background-image template-background-image-2 template-color-white">
			
				<!-- Header + subheader -->
				<div class="template-component-header-subheader">
					<h2>Recent News</h2>
					<div></div>
					<span>Recent from the blog</span>
				</div>
				
				<!-- Recent posts list -->
				<ul class="template-component-recent-post">
					<li>
						<a href="single-post-right-sidebar.html">
							<span>How to choose car detailing company</span>
							<span>April 14, 2015</span>
						</a>
					</li>
					<li>
						<a href="single-post-right-sidebar.html">
							<span>Interior car wash and detailing service</span>
							<span>March 25, 2015</span>
						</a>
					</li>
					<li>
						<a href="single-post-right-sidebar.html">
							<span>How to book a car wash online</span>
							<span>March 05, 2015</span>
						</a>
					</li>
				</ul>
				
			</div>
			
		</div>
		
	</div>
	
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

	<style>
		body {
font-family: 'Open Sans Condensed', sans-serif;
}

/* CSS Code */
.popScroll
{
position:fixed; z-index:1000000; top:0;
display:    table;
text-align: center;
width:      100%;
height:     100%;

}


.popup
{
  z-index: 10;
width:450px;
height:480px;
position:relative;
margin:20px auto;
display:block;
text-align:center;
-moz-background-clip: padding;
-o-background-clip: padding;
-webkit-background-clip: padding-box;
background-clip: padding-box; /* prevents bg color from leaking outside the border */
background-color: #fff; /* layer fill content */
-moz-box-shadow: 0 0 10px rgba(0,0,0,.18); /* drop shadow */
-webkit-box-shadow: 0 0 10px rgba(0,0,0,.18); /* drop shadow */
-o-box-shadow: 0 0 10px rgba(0,0,0,.18); /* drop shadow */
box-shadow: 0 0 10px rgba(0,0,0,.18); /* drop shadow */
-webkit-transform-origin:top center;
-moz-transform-origin:top center;
-o-transform-origin:top center;
transform-origin:top center;
-webkit-animation: iconosani 1.2s forwards;
animation: iconosani 1.2s forwards;
-moz-animation: iconosani 1.2s forwards;
-o-animation: iconosani 1.2s forwards;
}

@-webkit-keyframes iconosani {
    0% {
        -webkit-transform: perspective(800px) rotateX(-90deg);
        -moz-transform: perspective(800px) rotateX(-90deg);
        -o-transform: perspective(800px) rotateX(-90deg);
        opacity: 1;
    } 
    40% {
        -webkit-transform: perspective(800px) rotateX(30deg);
        -moz-transform: perspective(800px) rotateX(30deg);
        -o-transform: perspective(800px) rotateX(30deg);
        opacity: 1;
    }
    70% {
        -webkit-transform: perspective(800px) rotateX(-10deg);
        -moz-transform: perspective(800px) rotateX(-10deg);
        -o-transform: perspective(800px) rotateX(-10deg);
    }
    100% {
        -webkit-transform: perspective(800px) rotateX(0deg);
        -moz-transform: perspective(800px) rotateX(0deg);
        -o-transform: perspective(800px) rotateX(0deg);
        opacity: 1;
    }
}


.popScroll h1
{
  height: 60px;
  position: relative;
  color: #fff;
  font: 25px/60px sans-serif;
  text-align: center;
  text-transform: uppercase;
  background: #3D79D0;
}
.popScroll form{
margin:10px auto;
}

.subscribe-widget .email-form {
font-size: 13px;
color: #999999;
padding-left: 6px;
width: 270px;
border: 1px solid #e0e0e0;
padding: 5px 0 5px 5px;
line-height: 25px;
}

.subscribe-widget .button {
background: #3D79D0;
padding: 6px 15px;
color: #fff;
border: none;
line-height: 25px;
margin-left:0;
cursor:pointer;
}

input[type="submit"] {
-webkit-appearance: button;
-moz-appearance: button;
-o-appearance: button;
cursor: pointer;
}

.popScroll p { padding: 1px 5px; 	font-family: 'Open Sans'; font-size: 17px; margin-bottom: 10px;  }


#option { position: relative; }

.boxi {
	display: inline-block;
	width: 169px;
	line-height: 42px;
	color: #fff;
	text-align: center;
	text-decoration: none;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	-o-transition: all 0.1s linear;
	}

#home { 
	background: #3D79D0;
	}

#close { 
	background: #D21111;
	}

.popScroll em {
	width: 42px;
	display: inline-block;
	position: relative;
	margin: 0 -20px;
	line-height: 42px;
	background: #fff;
	color: #777;
	text-align: center;
	border-radius: 50px;
	}

#home:hover { background: #1852C7;  }
#close:hover { background: #B30E0E; }


body.overlay:after{
  content:'';
  width:100%;
  height:100%;
  top:0px; left:0px;
  z-index:0;
  opacity:.8;
position:fixed; top:0; left:0; bottom:0; right:0;
  background:#000;
}

body.overlay{ /* Prevents scrolling */
  overflow:hidden;
  max-height:100%;
  max-width:100%;
}


.ribbon {
  position: absolute;
  z-index: 100;
  width: 100px;
  height: 100px;
  overflow: hidden;
}

.ribbon.top-left {
  top: -2.6px;
  left: -5px;
}

.ribbon.top-left.ribbon-primary > small {
  *zoom: 1;
  filter: progid:DXImageTransform.Microsoft.gradient(gradientType=0, startColorstr='#FF428BCA', endColorstr='#FF2A6496');
  background-image: -moz-linear-gradient(top, #428bca 0%, #2a6496 100%);
  background-image: -webkit-linear-gradient(top, #428bca 0%, #2a6496 100%);
  background-image: linear-gradient(to bottom, #428bca 0%, #2a6496 100%);
  position: absolute;
  display: block;
  width: 100%;
  padding: 8px 10px;
  text-align: center;
  text-transform: uppercase;
  font-weight: bold;
  font-size: 65%;
  color: white;
  background-color: #428bca;
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
  transform: rotate(-45deg);
  -moz-box-shadow: 0 3px 6px -3px rgba(0, 0, 0, 0.5);
  -webkit-box-shadow: 0 3px 6px -3px rgba(0, 0, 0, 0.5);
  box-shadow: 0 3px 6px -3px rgba(0, 0, 0, 0.5);
  top: 16px;
  left: -27px;
}
.ribbon.top-left.ribbon-primary > small:before, .ribbon.top-left.ribbon-primary > small:after {
  position: absolute;
  content: " ";
}
.ribbon.top-left.ribbon-primary > small:before {
  left: 0;
}
.ribbon.top-left.ribbon-primary > small:after {
  right: 0;
}
.ribbon.top-left.ribbon-primary > small:before, .ribbon.top-left.ribbon-primary > small:after {
  bottom: -3px;
  border-top: 3px solid #0e2132;
  border-left: 3px solid transparent;
  border-right: 3px solid transparent;
}

.banner
{
width:300px;
height:250px;
position:relative;
margin:10px auto;
display:block;
text-align:center;
-moz-background-clip: padding;
-webkit-background-clip: padding-box;
background-clip: padding-box; /* prevents bg color from leaking outside the border */
background-color: #fff; /* layer fill content */
-moz-box-shadow: 0 0 10px rgba(0,0,0,.18); /* drop shadow */
-webkit-box-shadow: 0 0 10px rgba(0,0,0,.18); /* drop shadow */
box-shadow: 0 0 10px rgba(0,0,0,.18); /* drop shadow */
}

.adstext
{
margin-top:20px; color:#000; position:relative;
}


@media screen and (max-width: 600px) {


.popup
{
width:370px;
height:480px;
}


.popScroll h1
{
  height: 40px;
  font: 18px/40px sans-serif;
}

.subscribe-widget .email-form {
width:210px;
}

.adstext
{
margin-top:20px;
}

}

@media screen and (max-width: 400px) {


.popup
{
width:350px;
height:480px;
}


.popScroll h1
{
  height: 40px;
  font: 18px/40px sans-serif;
}

.subscribe-widget .email-form {
width:210px;
}


.banner
{
margin:10px auto;

}

.adstext
{
margin-top:20px;
}
}

input.email-form:active, input.email-form:focus {
  -webkit-animation: fade 0.55s ease-in;
  -moz-animation: fade 0.55s ease-in;
  animation: fade 0.55s ease-in;
}

@-webkit-keyframes fade {
  0% {
    box-shadow: 0 0 0 0 transparent;
  }

  66% {
    box-shadow: 0 0 0 10px #3D79D0, 0 0 0 12px white;
  }

  100% {
    box-shadow: 0 0 0 20px  transparent, 0 0 0 22px  transparent;
  }
}
@-moz-keyframes fade {
  0% {
    box-shadow: 0 0 0 0 transparent;
  }

  66% {
    box-shadow: 0 0 0 10px #3D79D0, 0 0 0 12px white;
  }

  100% {
    box-shadow: 0 0 0 20px  transparent, 0 0 0 22px  transparent;
  }
}
@-o-keyframes fade {
  0% {
    box-shadow: 0 0 0 0 transparent;
  }

  66% {
    box-shadow: 0 0 0 10px #3D79D0, 0 0 0 12px white;
  }

  100% {
    box-shadow: 0 0 0 20px  transparent, 0 0 0 22px  transparent;
  }
}
@keyframes fade {
  0% {
    box-shadow: 0 0 0 0 transparent;
  }

  66% {
    box-shadow: 0 0 0 10px #3D79D0, 0 0 0 12px white;
  }

  100% {
    box-shadow: 0 0 0 20px  transparent, 0 0 0 22px  transparent;
  }
}


/* POPUP */

.box {
    display: table;
    top: 0;
    visibility: hidden;
    -webkit-transform: perspective(1200px) rotateY(180deg) scale(0.1);
    -ms-transform: perspective(1200px) rotateY(180deg) scale(0.1);
    -moz-transform: perspective(1200px) rotateY(180deg) scale(0.1);
    transform: perspective(1200px) rotateY(180deg) scale(0.1);
    top: 0;
    left: 0;
    z-index: -1;
    position: absolute;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: 1s all;
}

.box p {
    display: table-cell;
    vertical-align: middle;
    font-size: 64px;
    color: #ffffff;
    text-align: center;
    margin: 0;
    opacity: 0;
    transition: .2s;
    -webkit-transition-delay: 0.2s;
    -moz-transition-delay: 0.2s;
    -ms-transition-delay: 0.2s;
    transition-delay: 0.2s;
}

.box p i {
    font-size: 128px;
    margin:0 0 20px;
    display:block;
}

.box .close {
  display:block;
  cursor:pointer;
  border:3px solid rgba(255, 255, 255, 1);
  border-radius:50%;
  position:absolute;
  top:50px;
left:50px;
  width:50px;
  height:50px;
  -webkit-transform:rotate(45deg);
  -ms-transform:rotate(45deg);
  -moz-transform:rotate(45deg);
  transform:rotate(45deg);
  transition: .2s;
  -webkit-transition-delay: 0.2s;
  -ms-transition-delay: 0.2s;
  -moz-transition-delay: 0.2s;
  transition-delay: 0.2s;
  opacity:0;
}

.box .close:active {
    top:51px;
}

.box .close::before {
  content: "";
  display: block;
  position: absolute;
  background-color: rgba(255, 255, 255, 1);
  width: 80%;
  height: 6%;
  left: 10%;
  top: 47%;
}

.box .close::after {
  content: "";
  display: block;
  position: absolute;
  background-color: rgba(255, 255, 255, 1);
  width: 6%;
  height: 80%;
  left: 47%;
  top: 10%;
}

.box.open {
    left: 0;
    top: 0;
    visibility: visible;
    opacity: 1;
    z-index: 999;
    -webkit-transform: perspective(1200px) rotateY(0deg) scale(1);
    -moz-transform: perspective(1200px) rotateY(0deg) scale(1);
    -ms-transform: perspective(1200px) rotateY(0deg) scale(1);
    transform: perspective(1200px) rotateY(0deg) scale(1);
    width: 100%;
    height: 100%;
}

.box.open .close, .box.open p {
    opacity: 1;
}









#card {
  font-family: Georgia;
  background: #fff;
  width: 450px;
  height: 185px;
  margin: 200px auto;
  padding: 10px 25px 30px 25px;

  border: 1px solid white;
  -webkit-box-shadow: -1px 1px 8px 5px rgba(0, 0, 0, 0.2), inset 0 0 30px rgba(0, 0, 0, 0.1);
  -o-box-shadow: -1px 1px 8px 5px rgba(0, 0, 0, 0.2), inset 0 0 30px rgba(0, 0, 0, 0.1);
  -moz-box-shadow: -1px 1px 8px 5px rgba(0, 0, 0, 0.2), inset 0 0 30px rgba(0, 0, 0, 0.1);
  -khtml-box-shadow: -1px 1px 8px 5px rgba(0, 0, 0, 0.2), inset 0 0 30px rgba(0, 0, 0, 0.1);
  -ms-box-shadow: -1px 1px 8px 5px rgba(0, 0, 0, 0.2), inset 0 0 30px rgba(0, 0, 0, 0.1);
  box-shadow: -1px 1px 8px 5px rgba(0, 0, 0, 0.2), inset 0 0 30px rgba(0, 0, 0, 0.1);
  text-align: center; }
  #card spa {
    color: #dc152c;
    font-weight: normal;
    font-size: 48px;
margin-bottom:10px;}
    #card spa::first-letter {
      color: #194ff7; }
    #card spa b {
      color: #f1840b;
      font-weight: normal; }
    #card spa b + b {
      color: #194ff7; }
    #card spa b + b + b {
      color: #00940e; }

.content {
  text-align: left;
  /* Pure CSS3 typing animation with steps() :
     http://lea.verou.me/2011/09/pure-css3-typing-animation-with-steps/ */ }
  .content ul {
    padding: 0;
    margin: 5px;
    font: 16px Arial; }
    .content ul li {
      list-style: none; }
      .content ul li a {
        color: #12C; }
      .content ul li span {
        display: block;
        width: 100%;
        margin-bottom: 2px; }
        .content ul li span:nth-child(2) {
          margin-bottom: 10px; }
          .content ul li span:nth-child(2) a {
            color: #093;
            text-decoration: none; }
        .content ul li span:nth-child(3), .content ul li span:nth-child(4) {
          font-size: 14px; }
  .content .text {
    border: 1px solid #7ec6fd;
    float: left;
    width: 100%;
    margin-bottom: 10px; }
    .content .text h2 {
      position: relative;
      float: left;
      font-size: 100%;
      font-weight: normal;
      padding: 0;
      margin: 5px 10px; }
      .content .text h2 span {
        position: absolute;
        top: 0;
        right: 0;
        width: 0;
        background: white;
        /* same as background */
        border-left: 0.1em solid black;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
 }



/*****************
Section 
******************/

section {
  height: 100%;
  text-align: center;
}


section h1 {
  padding-top: 17%;
  font-family: 'Vollkorn', serif;
  font-size: 48px;
}


section p {
  width: 500px;
  margin: -28px auto 32px;
  font-family: 'Muli', sans-serif;
  font-size: 18px;
  line-height: 1.35;
}




 
	</style>

  </div>
	
</div>
@stop
@section('footer')
@include('layouts.footer')	
@endsection
