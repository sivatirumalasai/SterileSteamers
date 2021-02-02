
<!DOCTYPE html>

<html>

    <head>
        @if(!isset($title))
        @php($title="")
        @endif  
        <title>Sterilie Steamrs {{ $title }}</title>
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
        {{-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('image-slide.scss') }}"/>  --}}

        <script type="text/javascript" src="{{ URL::asset('script/jquery.min.js') }}"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script>
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
        </script>
    </head>

    <body class="template-page-book-your-wash">

    @yield('header') 
    @yield("content")
    @yield('footer')