@extends('layouts.app')
@section('header')
@include('layouts.header')
@stop
@section('content')
<!-- Header -->
<div class="template-header template-header-background template-header-background-1" style="background-image: url('media/image/background-image/7.jpg') !important">			
		
    <div class="template-header-bottom">
    
        <div class="template-main">

            <div class="template-header-bottom-page-title">
                <h1>Coupons</h1>
            </div>

            <div class="template-header-bottom-page-breadcrumb">
                <a href="#">Save time and money</a>
            </div>
        
        </div>

    </div>
        
</div>
<!-- Content -->
<div class="template-content">
    
    <div class="template-section template-section-padding-1 template-clear-fix template-main">
        
        <!-- Text -->
        <div class="template-align-center"> 
            <p>
                We are dedicated to providing quality service, customer satisfaction at a great value in multiple locations offering convenient hours.<br/>
                Our goal is to provide our customers with the friendliest, most convenient hand car wash experience possible.
            </p>
        </div>
        
        <!-- Space -->
        <div class="template-component-space template-component-space-2"></div>
        
        <!--- Layout 33x33x33% -->
        <ul class="template-layout-33x33x33 template-clear-fix">
            @php($i=1)
        @foreach ($coupons as $coupon)
            @if($i==1)
            <!-- Left column -->
            <li class="template-layout-column-left">
                <div class="template-component-image template-component-image-preloader">
                    <a href="{{ route('CouponCart',['id'=>$coupon->id]) }}">
                        <img src="{{ Storage::url($coupon->image) }}" alt=""/>
                        <span class="template-component-image-hover"></span>
                    </a>
                </div>
                <h4 class="template-margin-top-2">
                <div class="template-blog-header-meta">
                    <span class="template-icon-meta-user">
                        <a href="#">{{ $coupon->name }}</a>
                    </span>
                    <span class="template-icon-meta-price">
                        <a href="#"><b> Rs.{{ $coupon->amount }}/-</b></a>
                    </span>
                </div>
                </h4>
            </li>
            @php($i++)
            @elseif($i==2)
            <!-- Center column -->
            <li class="template-layout-column-center">
                <div class="template-component-image template-component-image-preloader">
                    <a href="{{ route('CouponCart',['id'=>$coupon->id]) }}">
                        <img src="{{ Storage::url($coupon->image) }}" alt=""/>
                        <span class="template-component-image-hover"></span>
                    </a>
                </div>
                <h4 class="template-margin-top-2">
                    <div class="template-blog-header-meta">
                        <span class="template-icon-meta-user">
                            <a href="#">{{ $coupon->name }}</a>
                        </span>
                        <span class="template-icon-meta-price">
                            <a href="#"><b> Rs.{{ $coupon->amount }}/-</b></a>
                        </span>
                    </div>
                </h4>
                <p class="template-padding-reset">
                   
                </p>
            </li>

            @php($i++)
            @else
            <!-- Right column -->
            <li class="template-layout-column-right">
                <div class="template-component-image template-component-image-preloader">
                    <a href="{{ route('CouponCart',['id'=>$coupon->id]) }}">
                        <img src="{{ Storage::url($coupon->image) }}" alt=""/>
                        <span class="template-component-image-hover"></span>
                    </a>
                </div>
                <h4 class="template-margin-top-2">
                    <div class="template-blog-header-meta">
                        <span class="template-icon-meta-user">
                            <a href="#">{{ $coupon->name }}</a>
                        </span>
                        <span class="template-icon-meta-price">
                            <a href="#"><b> Rs.{{ $coupon->amount }}/-</b></a>
                        </span>
                    </div>
                </h4>
                <p class="template-padding-reset"></p>
            </li>
            @php($i=0)
            @endif
        @endforeach 
            
            
        </ul>
        
    </div>
    
    
    
</div>

@stop
@section('footer')
@include('layouts.footer')	
@endsection
