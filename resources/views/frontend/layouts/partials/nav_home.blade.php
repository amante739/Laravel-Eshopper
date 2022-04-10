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
<!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    @foreach($categories as $key => $category)
                    @if(count($category->subcategories) > 0)
                    <div class="nav-item dropdown">
                        <a href="{{ url('product-search/'.$category['cat_slug']) }}" class="nav-link"
                            data-toggle="dropdown">{{ $category['cat_name'] }} <i
                                class="fa fa-angle-down float-right mt-1"></i></a>
                        @if(count($category->subcategories) > 0)
                        <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                            @foreach ($category->subcategories as $subcat)
                            <a href="{{ url('product-search/'.$category['cat_slug'].'/'.$subcat['subcat_slug']) }}"
                                class="dropdown-item">{{
                                $subcat['subcat_name'] }}</a>
                            @endforeach
                        </div>

                        @endif



                    </div>
                    @else
                    <a href="{{ url('product-search/'.$category['cat_slug']) }}" class="nav-link"
                        data-toggle="dropdown">{{
                        $category['cat_name'] }} </a>
                    @endif


                    @endforeach

                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span
                            class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">

                        <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
                        <a href="{{ route('shop.index') }}" class="nav-item nav-link">Shop</a>

                        <a href="{{ route('about-us.index') }}" class="nav-item nav-link">About Us</a>
                        <!--<div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="cart.html" class="dropdown-item">Shopping Cart</a>
                                <a href="checkout.html" class="dropdown-item">Checkout</a>
                            </div>
                        </div>-->
                        <a href="{{ route('contact.index') }}" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0">
                        @if(Auth::user())
                        <button class="btn  dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span>{{ Auth::user()->first_name.' '.Auth::user()->last_name }}</span>
                        </button>
                        @else
                        <button class="btn  dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span>Account</span>
                        </button>
                        @endif

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">

                            @if(Auth::user())
                            <a href="{{ route('account.index') }}" class="dropdown-item">My Account</a>
                            @endif
                            @if(!empty(session('cart')))
                            <a href="{{ route('checkout.index') }}" class="dropdown-item">Checkout</a>
                            @endif
                            @if(Auth::user())
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="dropdown-item">logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            @else
                            <a class="dropdown-item" href="#" data-target="#modalLoginForm" data-toggle="modal">Sign</a>
                            @endif

                        </div>
                    </div>

                </div>
            </nav>
            <div id="header-carousel" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    @foreach ($banners as $banner)
                    @php $url = url("storage/".$banner->banner_image) @endphp
                    <div class="carousel-item active" style="height: 410px;">
                        <img class="img-fluid" src="{{$url}}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order
                                </h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">Fashionable Dress</h3>
                                <a href="" class="btn btn-light py-2 px-3">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>

            </div>
        </div>
    </div>
</div>
<!-- Navbar End -->