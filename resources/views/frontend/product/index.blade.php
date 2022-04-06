@extends('frontend.layouts.home_master')

@section('content')

    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Product Details</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- content-wraper start -->
    <div class="content-wraper pb-50">
        <div class="container">
            @if ($message = Session::get('success'))
            <div class="alert alert-success text-center">
                <p><b>{{ $message }}</b></p>
            </div>
            @endif
            @if ($message = Session::get('quantity_error'))
            <div class="alert alert-danger text-center">
                <p><b>{{ $message }}</b></p>
            </div>
            @endif
            <div class="row single-product-area">
                <div class="col-lg-5 col-md-6">
                    <!-- Product Details Left -->
                    <div class="product-details-left">
                        <div class="product-details-images slider-navigation-1">
                            @foreach ($images as $pro_image)
                            <div class="lg-image">
                                <a class="popup-img venobox vbox-item" href="{{ asset('storage/'.$pro_image) }}" data-gall="myGallery">
                                    <img style="margin-bottom: 20px;object-fit: cover;height: 415px;" src="{{ asset('storage/'.$pro_image) }}" alt="product image">
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div class="product-details-thumbs slider-thumbs-1">
                            @foreach ($images as $pro_image)
                            <div class="sm-image"><img height="88px;object-fit:cover;" src="{{ asset('storage/'.$pro_image) }}" alt="product image thumb"></div>
                            @endforeach
                        </div>
                    </div>
                    <!--// Product Details Left -->
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="product-details-view-content pt-60">
                        <div class="product-info">
                            <h2>{{ $product['pro_name'] }}</h2>
                            <!-- <span class="product-details-ref">Reference: demo_15</span> -->
                            <!-- <div class="rating-box pt-20">
                                <ul class="rating rating-with-review-item">
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    <li class="review-item"><a href="#">Read Review</a></li>
                                    <li class="review-item"><a href="#" data-toggle="modal" data-target="#mymodal">Write Review</a></li>
                                </ul>
                            </div> -->
                            <div class="price-box pt-20">
                                <span class="new-price new-price-2">৳{{ $product['pro_sale_price'] }}</span>
                            </div>
                            <div class="product-desc">
                                <p>
                                    <span>{{ $product['pro_content'] }}</span>
                                </p>
                            </div>
                            <!-- <div class="product-variants">
                                <div class="produt-variants-size">
                                    <label>Dimension</label>
                                    <select class="nice-select">
                                        <option value="1" title="S" selected="selected">40x60cm</option>
                                        <option value="2" title="M">60x90cm</option>
                                        <option value="3" title="L">80x120cm</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="single-add-to-cart">
                                <form action="{{ url('product-details-add-to-cart') }}" method="post" class="cart-quantity">
                                    @csrf
                                    <div class="quantity">
                                        <label>Quantity</label>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" name="pro_quantity" value="1" type="text">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                        </div>
                                    </div>
                                    <button class="add-to-cart" type="submit">Add to cart</button>
                                    <input name="id" value="{{ $product['id'] }}" type="hidden">
                                </form>
                            </div>
                            <!-- <div class="product-additional-info pt-25">
                                <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a>
                                <div class="product-social-sharing pt-25">
                                    <ul>
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google +</a></li>
                                        <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                                    </ul>
                                </div>
                            </div> -->
                            <div class="block-reassurance">
                                <ul>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-check-square-o"></i>
                                            </div>
                                            <p>Security policy (edit with Customer reassurance module)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-truck"></i>
                                            </div>
                                            <p>Delivery policy (edit with Customer reassurance module)</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-exchange"></i>
                                            </div>
                                            <p> Return policy (edit with Customer reassurance module)</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
    <!-- Begin Product Area -->
    <div class="product-area pt-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="li-product-tab">
                        <ul class="nav li-product-menu">
                            <li><a class="active" data-toggle="tab" href="#description"><span>Description</span></a></li>
                            <!-- <li><a data-toggle="tab" href="#product-details"><span>Product Details</span></a></li> -->
                            <!-- <li><a data-toggle="tab" href="#reviews"><span>Reviews</span></a></li> -->
                        </ul>               
                    </div>
                    <!-- Begin Li's Tab Menu Content Area -->
                </div>
            </div>
            <div class="tab-content">
                <div id="description" class="tab-pane active show" role="tabpanel">
                    <div class="product-description">
                        <span>{{ $product['pro_description'] }}</span>
                    </div>
                </div>
                <!-- <div id="product-details" class="tab-pane" role="tabpanel">
                    <div class="product-details-manufacturer">
                        <a href="#">
                            <img src="{{ asset('front/images/product-details/1.jpg') }}" alt="Product Manufacturer Image">
                        </a>
                        <p><span>Reference</span> demo_7</p>
                        <p><span>Reference</span> demo_7</p>
                    </div>
                </div>
                <div id="reviews" class="tab-pane" role="tabpanel">
                    <div class="product-reviews">
                        <div class="product-details-comment-block">
                            <div class="comment-review">
                                <span>Grade</span>
                                <ul class="rating">
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                </ul>
                            </div>
                            <div class="comment-author-infos pt-25">
                                <span>HTML 5</span>
                                <em>01-12-18</em>
                            </div>
                            <div class="comment-details">
                                <h4 class="title-block">Demo</h4>
                                <p>Plaza</p>
                            </div>
                            <div class="review-btn">
                                <a class="review-links" href="#" data-toggle="modal" data-target="#mymodal">Write Your Review!</a>
                            </div>

                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Product Area End Here -->
    
    
    
@endsection