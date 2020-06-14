<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Sistem Pusat Karir UPNVJ</title>
        <link href="{{ asset('user-style/css/media_query.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('user-style/css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('user-style/images/favicon.ico')}}" rel="shortcut icon" type="image/icon" />
        <link href="{{ asset('user-style/css/animate.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('user-style/css/owl.carousel.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('user-style/css/slick.css')}}" rel="stylesheet">
        <link href="{{ asset('user-style/css/magnific-popup.css')}}" rel="stylesheet">
        <link href="{{ asset('user-style/css/owl.theme.default.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('user-style/images/favicon.ico')}}" type="image/x-icon" rel="shortcut icon" >
        <link href="{{ asset('user-style/images/apple-touch-icon.png')}}" rel="apple-touch-icon" >
        <link href="{{ asset('user-style/css/style.css')}}" rel="stylesheet" type="text/css"/>
        <script src="{{ asset('user-style/js/modernizr-3.5.0.min.js')}}"></script>
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,500i,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,800" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        @yield('css')
        @yield('js-top')
    </head>
<body>
    @include('user.partials.alert')
    @include('user.partials.header')
    @include('user.partials.navbar')
    @yield('content')

{{-- info upn --}}

    @include('user.partials.footer')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

<script src="{{ asset('user-style/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('user-style/js/jquery.waypoints.min.js')}}"></script>
<script src="{{ asset('user-style/js/main.js')}}"></script>

    @yield('js-bottom')

<script>
    $(".alert").delay(5000).slideUp(200, function() {
        $(this).alert('close');
    });
</script>

</body>
