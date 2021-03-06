@extends('frontend.layouts.home_master')
@section('nav')
@include('frontend.layouts.partials.nav')
@endsection
@section('content')


<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">About Us</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{ url('/') }}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">About Us</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Contact Start -->
<div class="container-fluid pt-5">

    <div class="row px-xl-5">
        <div class="col-lg-7 mb-5">
            <div class="about-text-wrap">
                <h2><span>Provide Best</span>Product For You</h2>
                <p>We provide the best Beard oile all over the world. We are the worldd best store in indi for Beard
                    Oil. You can
                    buy our product without any hegitation because they truste us and buy our product without any
                    hagitation because
                    they belive and always happy buy our product.</p>
                <p>Some of our customer say’s that they trust us and buy our product without any hagitation because they
                    belive us
                    and always happy to buy our product.</p>
                <p>We provide the beshat they trusted us and buy our product without any hagitation because they belive
                    us and
                    always happy to buy.</p>
            </div>
        </div>
        <div class="col-lg-5 mb-5">

            <img class="img-full" src="{{ asset('front/img/product/large-size/13.jpg') }}" alt="About Us" />

        </div>
    </div>
</div>

<!-- team area wrapper start -->
<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">

                <div class="container">
                    <div class="counter-img">
                        <img src="{{ asset('front/img/about-us/icon/1.png') }}" alt="">
                    </div>
                    <div class="counter-info">
                        <div class="counter-number">
                            <h3 class="counter">2169</h3>
                        </div>
                        <div class="counter-text">
                            <span>HAPPY CUSTOMERS</span>
                        </div>
                    </div>

                </div>


            </div>

        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">

                <div class="container">
                    <div class="counter-img">
                        <img src="{{ asset('front/img/about-us/icon/2.png') }}" alt="">
                    </div>
                    <div class="counter-info">
                        <div class="counter-number">
                            <h3 class="counter">869</h3>
                        </div>
                        <div class="counter-text">
                            <span>AWARDS WINNED</span>
                        </div>
                    </div>

                </div>


            </div>

        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">

                <div class="container">
                    <div class="counter-img">
                        <img src="{{ asset('front/img/about-us/icon/3.png') }}" alt="">
                    </div>
                    <div class="counter-info">
                        <div class="counter-number">
                            <h3 class="counter">689</h3>
                        </div>
                        <div class="counter-text">
                            <span>HOURS WORKED</span>
                        </div>
                    </div>

                </div>


            </div>

        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">

                <div class="container">
                    <div class="counter-img">
                        <img src="{{ asset('front/img/about-us/icon/4.png') }}" alt="">
                    </div>
                    <div class="counter-info">
                        <div class="counter-number">
                            <h3 class="counter">2169</h3>
                        </div>
                        <div class="counter-text">
                            <span>COMPLETE PROJECTS</span>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>
</div>
<div class="team-area pt-60 pt-sm-44">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="li-section-title capitalize mb-25">
                    <h2><span>our team</span></h2>
                </div>
            </div>
        </div> <!-- section title end -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-member mb-60 mb-sm-30 mb-xs-30">
                    <div class="team-thumb">
                        <img src="{{ asset('front/img/team/1.png') }}" alt="Our Team Member">
                    </div>
                    <div class="team-content text-center">
                        <h3>Jonathan Scott</h3>
                        <p>IT Expert</p>
                        <a href="#">info@example.com</a>
                        <div class="team-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div> <!-- end single team member -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-member mb-60 mb-sm-30 mb-xs-30">
                    <div class="team-thumb">
                        <img src="{{ asset('front/img/team/2.png') }}" alt="Our Team Member">
                    </div>
                    <div class="team-content text-center">
                        <h3>Oliver Bastin</h3>
                        <p>Web Designer</p>
                        <a href="#">info@example.com</a>
                        <div class="team-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div> <!-- end single team member -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-member mb-30 mb-sm-60">
                    <div class="team-thumb">
                        <img src="{{ asset('front/img/team/3.png') }}" alt="Our Team Member">
                    </div>
                    <div class="team-content text-center">
                        <h3>Erik Jonson</h3>
                        <p>Web Developer</p>
                        <a href="#">info@example.com</a>
                        <div class="team-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div> <!-- end single team member -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team-member mb-30 mb-sm-60 mb-xs-60">
                    <div class="team-thumb">
                        <img src="{{ asset('front/img/team/4.png') }}" alt="Our Team Member">
                    </div>
                    <div class="team-content text-center">
                        <h3>Maria Mandy</h3>
                        <p>Marketing officer</p>
                        <a href="#">info@example.com</a>
                        <div class="team-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div> <!-- end single team member -->
        </div>
    </div>
</div>
<!-- team area wrapper end -->
<!-- Contact End -->
<!-- Contact Main Page Area End Here -->

@endsection