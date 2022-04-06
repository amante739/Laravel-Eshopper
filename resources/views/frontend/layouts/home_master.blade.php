<!doctype html>
<html class="no-js" lang="zxx">

<!-- index-231:32-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>EShopper - || Under one Roof</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Favicon -->
    <link href="{{asset('front/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('front/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet">
</head>

<body>

    @include('frontend.layouts.partials.topbar')
    @include('frontend.layouts.partials.nav')
    
    @yield('content')
    @include('frontend.layouts.partials.footer')

    <!-- Body Wrapper End Here -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('front/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('front/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('front/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('front/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('front/js/main.js')}}"></script>

    @yield('extrajs')
</body>

<!-- index-231:38-->

</html>