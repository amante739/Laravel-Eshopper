
<!-- Begin Slider With Category Menu Area -->
<div class="slider-with-banner">
    <div class="container">
        <div class="row">
            <!-- Begin Category Menu Area -->
            <div class="col-lg-3">
                <!--Category Menu Start-->
                <div class="category-menu">
                    <div class="category-heading">
                        <h2 class="categories-toggle"><span>categories</span></h2>
                    </div>
                    <div id="cate-toggle" class="category-menu-list">
                        <ul>
                            @foreach($categories as $key => $category)
                                <li class="@if($key >=8) rx-child @endif @if(count($category->subcategories) > 0) right-menu @endif">
                                    <a href="{{ url('product-search/'.$category['cat_slug']) }}">{{ $category['cat_name'] }}</a>
                                    @if(count($category->subcategories) > 0)
                                    <ul class="cat-mega-menu">
                                        @foreach ($category->subcategories as $subcat)
                                        <li class="right-menu cat-mega-title">
                                            <a href="{{ url('product-search/'.$category['cat_slug'].'/'.$subcat['subcat_slug']) }}">{{ $subcat['subcat_name'] }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                            @endforeach
                            
                            <li class="rx-parent">
                                <a class="rx-default">More Categories</a>
                                <a class="rx-show">Less Categories</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--Category Menu End-->
            </div>
            <!-- Category Menu Area End Here -->
            <!-- Begin Slider Area -->
            <div class="col-lg-9">
                <div class="slider-area pt-sm-30 pt-xs-30">
                    <div class="slider-active owl-carousel">
                        <!-- Begin Single Slide Area -->
                        @foreach ($banners as $banner)
                        @php $url = url("storage/".$banner->banner_image) @endphp
                        <div class="single-slide align-center-left animation-style-02 bg-4" style="background-image: url({{$url}}) !important;">
                            <div class="slider-progress"></div>
                            <div class="slider-content">
                                <!-- <h5>Sale Offer <span>-20% Off</span> This Week</h5>
                                <h2>Chamcham Galaxy S9 | S9+</h2>
                                <h3>Starting at <span>$589.00</span></h3> -->
                                <div class="default-btn slide-btn mt-4">
                                    <a class="links" href="{{ route('shop.index') }}">Shopping Now</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- Single Slide Area End Here -->
                        <!-- Begin Single Slide Area -->
                        <!-- <div class="single-slide align-center-left animation-style-01 bg-5">
                            <div class="slider-progress"></div>
                            <div class="slider-content">
                                <h5>Sale Offer <span>Black Friday</span> This Week</h5>
                                <h2>Work Desk Surface Studio 2018</h2>
                                <h3>Starting at <span>$1599.00</span></h3>
                                <div class="default-btn slide-btn">
                                    <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                </div>
                            </div>
                        </div> -->
                        <!-- Single Slide Area End Here -->
                        <!-- Begin Single Slide Area -->
                        <!-- <div class="single-slide align-center-left animation-style-02 bg-6">
                            <div class="slider-progress"></div>
                            <div class="slider-content">
                                <h5>Sale Offer <span>-10% Off</span> This Week</h5>
                                <h2>Phantom 4 Pro+ Obsidian</h2>
                                <h3>Starting at <span>$809.00</span></h3>
                                <div class="default-btn slide-btn">
                                    <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                </div>
                            </div>
                        </div> -->
                        <!-- Single Slide Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Slider Area End Here -->
        </div>
    </div>
</div>
<!-- Slider With Category Menu Area End Here -->