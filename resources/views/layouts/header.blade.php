<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.11/css/intlTelInput.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.11/js/intlTelInput.min.js"></script>
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
                
                <li><a href="{{ route('user-cart') }}" style="color: @if($title=='UserCart') #199CDB @else #222222  @endif!important" class="template-icon-meta-cart"></a></li>
                <li><a href="#" style="color: #222222 !important" class="template-icon-meta-search"></a></li>
                <li><a href="#" style="color: #222222 !important"><button type="button" class="btn btn-info btn-lg template-icon-social-dribbble" onclick="myFunctionGetaccess()"></button>
                </a></li>
                <li><a href="#" style="color: #222222 !important" class="template-icon-meta-menu"></a></li>
            </ul>
        </div>

    </div>										
</div>


<!-- earlyaccess user details -->
<div class="back_overlay_details" style="display: none;">&nbsp;</div>
<div id="myModalearlyaccess"> 
    <div class="close_btn_early" id="close_earlyacces">x</div> 
    <div class="webarapp_head_title">Login or Register</div>
    <form onsubmit="return false;" id="advanced_features_form" action="" method="POST">
        @csrf
        <div class="row">
            
            <div class="col-sm-12 col-md-6">
              <div class="form-group mb-1">
                <label for="phonenumber">Phone Number:</label>
                <input type="tel" id="phonenumber" class="form-control" aria-describedby="username" placeholder="Ex: 9874563210" name="phonenumber" required="required">
              </div>
            </div>
              <div class="getearclyaccess">
                <button type="submit" class="submiteaaly" id="advanced_features_sub_btn">Submit</button>
              </div>
            </div>
    </form>                                    
</div>
<!-- End of earlyaccess users details -->

<!-- Get early access sections -->
<script type="text/javascript">
    function myFunctionGetaccess() {
       
        document.getElementById("myModalearlyaccess").style.display = "block";
        $(".back_overlay_details").show();
    }
    $(document).mouseup(function (e){
        var container = $("#myModalearlyaccess");
        if (!container.is(e.target) && container.has(e.target).length === 0){
            container.fadeOut();
            $(".back_overlay_details").hide();
        }
    });
    $(document).on("click","#close_earlyacces",function(){
        $("#myModalearlyaccess").hide();
        $(".back_overlay_details").hide();
    });
</script>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<style>
    #myModalearlyaccess {
    z-index: 100;
    display: none;
    width: 45%;
    height: fit-content;
    background-color: #ffffff;
    position: absolute;
    margin: auto;
    padding:0px 10px 10px 10px;
    border-radius: 10px;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

#myModalearlyaccess label{color: #9f9f9f;font-size: 13px;}

#myModalearlyaccess input{
    padding: 0px 10px;
    text-transform: inherit;
    font-size: 14px;
    letter-spacing: 0.2px;
    font-weight: 500;
    border: 1px solid #cccccc;
    border-radius: 5px;
    text-align: left;
}
#myModalearlyaccess input:focus {
  color:#2e2e2e;
}
#myModalearlyaccess textarea {
  text-align: left;
}
#myModalearlyaccess .webarapp_head_title {
    padding-left: 1%;
}
#myModalearlyaccess .webarapp_head_title span {
    font-size: 12px;
    font-weight: 300;
    margin-left: 5px;
    font-style: italic;
    color: #ffb900;
    letter-spacing: 0.5px;
}

div#myModalearlyaccess form {
    padding: 0px 5%;
}
.close_btn_early{
    right: 5px;
    top: 5px;
    position: absolute;
    background-color: #ffffff;
    color: #ff0000;
    width: 25px;
    height: 25px;
    line-height: 20px;
    text-align: center;
    font-size: 16px;
    font-weight: 700;
    border-radius: 50%;
    cursor: pointer;
    box-shadow: -3px 3px 12px 0 rgba(235, 15, 15, 0.24);
}
.close_btn_early:hover{
    background-color: #fe6b00;
    color: #ffffff;
}

.back_overlay_details{
    position: fixed;
    width: 100%;
    height: 100%;
    background: #00000087;
    display: none;
    z-index: 100;
    left: 0;
    top: 0;
    display: none;
}

</style>
<script>
    const phoneInputField = document.querySelector("#phoneNumber");
    const phoneInput = window.intlTelInput(phoneInputField, {
        separateDialCode: true,
        utilsScript:
            "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.11/js/utils.js"
        });
</script>