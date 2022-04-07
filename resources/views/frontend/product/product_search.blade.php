@extends('frontend.layouts.home_master')
@section('nav')
@include('frontend.layouts.partials.nav')
@endsection
@section('content')

   
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Product</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{ url('/') }}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0 active">Product</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
    
           
            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search by name">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Sort by
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($all_prod as $product)
                    <div class="col-lg-3 col-md-4 col-sm-12 pb-1">
                        <div class="card product-item border-0 mb-4">
                            <div
                                class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
    
                                <a href="{{ url('product-details/'.$product['pro_slug']) }}">
                                    <img class="img-fluid w-100" src="{{ asset('storage/'.$product['pro_main_image']) }}"
                                        alt="Li's Product Image">
                                </a>
                            </div>
                            <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                <h6 class="text-truncate mb-3"><a class="product_name"
                                        href="{{ url('product-details/'.$product['pro_slug']) }}">{{ $product['pro_name']
                                        }}</a></h6>
                                <div class="d-flex justify-content-center">
                                    <h6>৳{{ $product['pro_sale_price'] }}</h6>
                                    <h6 class="text-muted ml-2"><del>৳{{ $product['pro_sale_price'] }}</del></h6>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between bg-light border">
                                <a href="{{ url('product-details/'.$product['pro_slug']) }}"
                                    class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View
                                    Detail</a>
                                <a href="" class="btn btn-sm text-dark p-0"><i
                                        class="fas fa-shopping-cart text-primary mr-1"></i>Add To
                                    Cart</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
    
        </div>
    </div>

    <!-- Begin Li's Content Wraper Area -->
  
    <!-- Content Wraper Area End Here -->

@endsection