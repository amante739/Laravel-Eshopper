@extends('frontend.layouts.home_master')
@section('nav')
@include('frontend.layouts.partials.nav')
@endsection
@section('content')


<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{ url('/') }}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop</p>
        </div>
    </div>
</div>
<!-- Page Header End -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">

        <div class="col-lg-3 col-md-12">
            <form action="{{ url('shop') }}" method="post">
                @csrf
                @if($category_id || $brand_id)
                <a href="{{ route('shop.index') }}"><span class="btn-clear-all mb-sm-30 mb-xs-30">Clear all</span></a>
                @endif
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by Categories</h5>

                    @foreach ($all_categories as $category)

                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                        <input type="checkbox" @if(in_array($category->id, $category_id)) checked @endif
                        name="category_id[]" value="{{
                        $category['id'] }}" class="custom-control-input" id="price-all">
                        <label class="custom-control-label" for="price-all"><a>{{ $category['cat_name'] }} ({{
                                $category['cat_products_count'] }})</a></label>
                        <!--<span class="badge border font-weight-normal">1000</span>-->
                    </div>
                    @endforeach

                </div>
                <div class="border-bottom mb-4 pb-4">
                    <h5 class="font-weight-semi-bold mb-4">Filter by Brand</h5>

                    @foreach ($all_brands as $brand)

                    <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">

                        <input type="checkbox" class="custom-control-input" @if(in_array($brand->id, $brand_id)) checked
                        @endif name="brand_id[]" value="{{ $brand['id'] }}">
                        <label class="custom-control-label" for="price-all"><a>{{ $brand['brand_name'] }} ({{
                                $brand['brand_products_count'] }})</a></label>
                        <!--<span class="badge border font-weight-normal">1000</span>-->
                    </div>
                    @endforeach

                </div>
                <div class="border-bottom mb-4 pb-4">
                    <button type="submit" style="cursor: pointer;"
                        class="list-group-item list-group-item-action list-group-item-info text-center">Filter</button>
                </div>
            </form>
        </div>
        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
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
                            <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
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
                @foreach ($all_products as $product)
                <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            
                            <a href="{{ url('product-details/'.$product['pro_slug']) }}">
                                <img class="img-fluid w-100" src="{{ asset('storage/'.$product['pro_main_image']) }}" alt="Li's Product Image">
                            </a>
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3"><a class="product_name" href="{{ url('product-details/'.$product['pro_slug']) }}">{{ $product['pro_name'] }}</a></h6>
                            <div class="d-flex justify-content-center">
                                <h6>৳{{ $product['pro_sale_price'] }}</h6>
                                <h6 class="text-muted ml-2"><del>৳{{ $product['pro_sale_price'] }}</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="{{ url('product-details/'.$product['pro_slug']) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="{{ route('add.to.cart', $product['id']) }}" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To
                                Cart</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

@endsection