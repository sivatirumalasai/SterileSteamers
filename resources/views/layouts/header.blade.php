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
                        <li><a href="{{ route('home') }}" class="template-state" style="color: @if($title=='products') #199CDB @else #222222  @endif !important">Home</a></li>
                        <li >
                            <a href="#" style="color: @if($title=='Products') #199CDB @else #222222  @endif!important">Products</a>
                            <ul>
                                @foreach (App\Models\Product::all() as $product)
                                <li><a href="{{ route("product-info",['id'=>$product->code]) }}">{{ $product->name."(".$product->code.')' }}</a></li>	
                                @endforeach
                                
                            </ul>
                        </li>
                        <li >
                            <a href="{{ route("accessories-list") }}" style="color: @if($title=='Accessories') #199CDB @else #222222  @endif !important">Accessories</a>
                            {{-- <ul>
                                @foreach (App\Models\Accessory::all() as $accessory)
                                <li><a href="{{ route("accessory-info",['id'=>$accessory->code]) }}">{{ $accessory->name."(".$accessory->code.')' }}</a></li>	
                                @endforeach
                                
                            </ul> --}}
                        </li>
                        <li >
                            <a href="#" style="color: @if($title=='Services') #199CDB @else #222222  @endif !important">Services</a>
                            <ul>
                                @foreach (App\Models\Service::all() as $service)
                                <li><a href="{{ route("service-info",['id'=>$service->id]) }}">{{ $service->name }}</a></li>	
                                @endforeach
                                
                            </ul>
                        </li>
                        <li >
                            <a href="{{ route("contact") }}" style="color: @if($title=='contact') #199CDB @else #222222  @endif!important">Contact</a>
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
        <div class="template-header-top-icon-list template-component-social-icon-list-1" >
            <ul class="template-component-social-icon-list">
                {{-- <li><a href="https://twitter.com/quanticalabs" class="template-icon-social-twitter" target="_blank"></a></li>
                <li><a href="https://www.facebook.com/QuanticaLabs" class="template-icon-social-facebook" target="_blank"></a></li> --}}
                {{-- <li><a href="#" class="template-icon-social-dribbble" target="_blank"></a></li> --}}
                <li><a href="{{ route('user-cart') }}" style="color: @if($title=='UserCart') #199CDB @else #222222  @endif!important" class="template-icon-meta-cart"></a></li>
                <li><a href="#" style="color: #222222 !important" class="template-icon-meta-search"></a></li>
                <li><a href="#" style="color: #222222 !important" class="template-icon-meta-menu"></a></li>
            </ul>
        </div>

    </div>										
</div>
