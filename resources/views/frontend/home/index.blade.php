@extends('frontend.layouts.home_master')
@section('nav')
@include('frontend.layouts.partials.nav_home')
@endsection
@section('content')
@if ($message = Session::get('error'))
<div class="alert alert-danger text-center">
    <p><b>{{ $message }}</b></p>
</div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-success text-center">
    <p><b>{{ $message }}</b></p>
</div>
@endif

<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->
<!-- Products Start -->
@foreach ($featured_category as $cat_row)
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">{{ $cat_row['cat_name'] }}</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @foreach ($cat_row->cat_products as $product_row)
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <a href="{{ url('product-details/'.$product_row['pro_slug']) }}">
                        <img class="img-fluid w-100" src="{{ asset('storage/'.$product_row['pro_main_image']) }}"
                            alt="Li's Product Image">
                    </a>
                </div>
                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                    <h6 class="text-truncate mb-3">
                        <a class="product_name" href="{{ url('product-details/'.$product_row['pro_slug']) }}">{{
                            $product_row['pro_name'] }}</a>
                    </h6>
                    <div class="d-flex justify-content-center">
                        <h6>{{ $product_row['pro_sale_price'] }}</h6>
                        <h6 class="text-muted ml-2"><del>{{ $product_row['pro_sale_price'] }}</del></h6>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between bg-light border">
                    <a href="{{ url('product-details/'.$product_row['pro_slug']) }}" class="btn btn-sm text-dark p-0"><i
                            class="fas fa-eye text-primary mr-1"></i>View
                        Detail</a>
                    <a href="{{ route('add.to.cart', $product_row['id']) }}" class="btn btn-sm text-dark p-0"><i
                            class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endforeach
<!-- Products End -->

<!-- Vendor Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                <div class="vendor-item border p-4">
                    <img src="{{asset('front/img/vendor-1.jpg')}}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('front/img/vendor-2.jpg')}}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('front/img/vendor-3.jpg')}}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('front/img/vendor-4.jpg')}}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('front/img/vendor-5.jpg')}}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('front/img/vendor-6.jpg')}}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('front/img/vendor-6.jpg')}}" alt="">
                </div>
                <div class="vendor-item border p-4">
                    <img src="{{asset('front/img/vendor-6.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vendor End -->


@endsection