
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
										@foreach (App\Models\Service::all() as $service)
										<li><a href="{{ route("service-info",['id'=>$service->id]) }}">{{ $service->name }}</a></li>	
										@endforeach
									</ul>									
								</div>
								
								<!-- Center right column -->
								<div class="template-layout-column-center-right">
									<h6>Legal</h6>
									<ul class="template-list-reset">
										<li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
										<li><a href="{{ route('terms-conditions') }}">Terms & Conditions</a></li>
										<li><a href="{{ route('refund-policy') }}">Refund Policy</a></li>
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
								<li><a href="https://themeforest.net/user/QuanticaLabs/portfolio?ref=quanticalabs" class="template-icon-social-envato" target="_blank"></a></li>
								<li><a href="https://www.behance.net/quanticalabs" class="template-icon-social-behance" target="_blank"></a></li>
								<li><a href="https://www.youtube.com/user/quanticalabs" class="template-icon-social-youtube" target="_blank"></a></li>
							</ul>
							
							<!-- Copyright -->
							<div class="template-footer-bottom-copyright">
								By <a href="https://quanticalabs.com" target="_blank">QuanticaLabs</a> &copy; 2016 <a href="https://themeforest.net/user/QuanticaLabs/portfolio?ref=quanticalabs" target="_blank">Auto Spa Template</a>
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
				<script type="text/javascript" src="https://maps.google.com/maps/api/js"></script>  
				
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
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
				<script type="text/javascript" src="{{ URL::asset('script/public.js') }}"></script>
                {{-- <script type="text/javascript"  src="{{ URL::asset("image-slide.js") }}"></script> --}}
                <script>
                    const imageList=[];
                    
				</script>
				
				<script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
				{!! Toastr::message() !!}
				<script type="text/javascript" id="zsiqchat">var $zoho=$zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode: "8b96547ce6587118c501d2b95f211d4aabb34db20ff58ff04867ddd79c33677ba1023359a79583d0d58e9acae25ad7ca", values:{},ready:function(){}};var d=document;s=d.createElement("script");s.type="text/javascript";s.id="zsiqscript";s.defer=true;s.src="https://salesiq.zoho.in/widget";t=d.getElementsByTagName("script")[0];t.parentNode.insertBefore(s,t);</script>
            </body>
			
		</html>