@extends('layouts.app')
@section('header')
@include('layouts.header')
@stop
@section('content')
				<!-- Content -->
				<div class="template-content">

					<!-- Main -->
					<div class="template-section template-main">
					
						<!-- Layout -->
						<div class="template-content-layout template-content-layout-sidebar-right template-clear-fix">

							<!-- Left column -->
							<div class="template-content-layout-column-left">

								<div class="template-blog template-blog-style-2">

									<ul>
										@foreach (App\Models\Accessory::all() as $item)
											<!-- Post -->
										<li>

											<!-- Header -->
											<div class="template-blog-header">

												<!-- Date -->
												<div style="display: none">
													<div class="template-blog-header-date">
														<span>Apr</span>
														<span>24</span>
														<span>2017</span>
													</div>
												</div>

												<!-- Header + Meta -->
												<div>

													<!-- Header -->
													<h3 class="template-blog-header-header">
														<a href="single-post-right-sidebar.html">{{ $item->name }}</a>
													</h3>

													<!-- Meta -->
													<div class="template-blog-header-meta">
														<span class="template-icon-meta-user">
															<a href="#">{{ $item->category }}</a>
														</span>
														<span class="template-icon-meta-category">
															<a href="#">{{ $item->code }}</a>
														</span>
														<span class="template-icon-meta-comment">
															<a href="#">{{ $item->actual_price }}</a>
														</span>
													</div>
												</div>

											</div>

											<!-- Image -->
											<div class="template-blog-image">
												<div class="template-component-image template-component-image-preloader">
													<a href="">
														@foreach(json_decode($item->images) as $product_image) 
														<img src="{{Storage::url($product_image)}}" alt="">
														@break
														@endforeach
														<span class="template-component-image-hover"></span>
													</a>
												</div>
											</div>

											<!-- Excerpt -->
											<div class="template-blog-excerpt">
												<p>{{ $item->description }}</p>
												<a href="{{ route("accessory-info",['id'=>$item->code]) }}" class="template-component-button">Add To Cart</a>
											</div>
										</li>
										@endforeach
										


									</ul>

									<!-- Pagination -->
									<div class="template-pagination template-clear-fix">
										<ul>
											<li class="template-pagination-button-prev"><a href="#" class="template-icon-meta-arrow-large-rl">&nbsp;</a></li>
											<li><a href="#">1</a></li>
											<li class="template-pagination-button-selected"><a href="#">2</a></li>
											<li><a href="#">3</a></li>
											<li class="template-pagination-button-next"><a href="#" class="template-icon-meta-arrow-large-rl">&nbsp;</a></li>
										</ul>
									</div>

								</div>							
							
							</div>

							<!-- Right column -->
							<div class="template-content-layout-column-right">
								
								<!-- Widgets list -->
								<ul class="template-widget-list">

									<!-- Widget -->
									<li>
										<div class="template-widget">

											<!-- Widget header -->
											<h6>Search Accessories</h6>

											<!-- Search widget -->
											<div class="template-widget-search">
												<div class="template-component-search-form">
													<form>
														<div>
															<input type="search" name="search"/>
															<span class="template-icon-meta-search"></span>
															<input type="submit" name="submit" value=""/>
														</div>
													</form>		
												</div>
											</div>

										</div>
									</li>


									<!-- Widget -->
									<li>
										<div class="template-widget">
											<h6>Categories</h6>

											<!-- Categories widget -->
											<div class="template-widget-category">
												<ul>
													<li>
														<a href="#">
															<span>Auto Detail</span>
															<span>12</span>
														</a>
													</li>
													<li>
														<a href="#">
															<span>Business</span>
															<span>5</span>
														</a>
													</li>
													<li>
														<a href="#">
															<span>General</span>
															<span>7</span>
														</a>
													</li>
													<li>
														<a href="#">
															<span>Hand Wash</span>
															<span>4</span>
														</a>
													</li>
													<li>
														<a href="#">
															<span>The Works</span>
															<span>0</span>
														</a>
													</li>
													<li>
														<a href="#">
															<span>Trends</span>
															<span>2</span>
														</a>
													</li>
												</ul>
											</div>

										</div>
									</li>

									<!-- Widget -->
									<li>
										<div class="template-widget">
											<h6>Popular Tags</h6>

											<!-- Popular tags widget -->
											<div class="template-widget-tag">
												<ul>
													<li><a href="#">Clear Coat</a></li>
													<li><a href="#">Dry</a></li>
													<li><a href="#">Shine</a></li>
													<li><a href="#">Tires</a></li>
													<li><a href="#">Triple Foam</a></li>
													<li><a href="#">Wash</a></li>
													<li><a href="#">Wax Polish</a></li>
													<li><a href="#">Wheel</a></li>
													<li><a href="#">Works</a></li>
												</ul>
											</div>

										</div>
									</li>

									<!-- Widget -->
									<li>
										<div class="template-widget">
											<h6>Text Widget</h6>

											<!-- Text widget -->
											<div class="template-widget-text">
												<p class="template-padding-reset">
													Primus elit lectus at felis malesuada node ultricies forte uno ligula sande. Porta an urna vestibulum commodo convallis laoreet enim.
												</p>
												<ul class="template-component-list template-margin-top-2">
													<li><span class="template-icon-meta-check"></span>We offer multiple services at a great value</li>
													<li><span class="template-icon-meta-check"></span>Biodegradable and eco-friendly products</li>
													<li><span class="template-icon-meta-check"></span>Pay for your wash electronically and securely</li>
												</ul>
											</div>

										</div>
									</li>

									<!-- Widget -->
									<li>
										<div class="template-widget">
											<h6>Archives</h6>

											<!-- Archive widget -->
											<div class="template-widget-archive">
												<ul>
													<li>
														<a href="#">
															<span>March 2015</span>
															<span>12</span>
														</a>
													</li>
													<li>
														<a href="#">
															<span>February 2015</span>
															<span>15</span>
														</a>
													</li>
													<li>
														<a href="#">
															<span>January2015</span>
															<span>10</span>
														</a>
													</li>
													<li>
														<a href="#">
															<span>December 2015</span>
															<span>16</span>
														</a>
													</li>
												</ul>
											</div>

										</div>
									</li>

								</ul>							
							
							</div>

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
	
				@stop
				@section('footer')
				@include('layouts.footer')
				@endsection