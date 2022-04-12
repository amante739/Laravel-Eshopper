@extends('frontend.layouts.home_master')
@section('nav')

@include('frontend.layouts.partials.nav')
@endsection
@section('content')

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{ url('/') }}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Checkout</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Checkout Start -->
<div class="d-flex flex-column align-items-center justify-content-center">
    <div class="row px-xl-5 pb-3">
        <div class="col-12">
            <div class="coupon-accordion">
                <!--Accordion Start-->
                @if(!Auth::user())
                <h3>Returning customer? <a href="#"><span id="showlogin">Click here to login</span></a></h3>
                <div id="checkout-login" class="coupon-content">
                    <div class="coupon-info">
                        <!-- <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p> -->
                        <form action="{{ url('user/login/') }}" method="post">
                            @csrf

                            <div class="col-md-6 form-group">
                                <label>Username or email <span class="required">*</span></label>
                                <input class="form-control" type="text" name="email">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Password <span class="required">*</span></label>
                                <input class="form-control" type="text" name="password">
                            </div>

                            <div class="col-md-6 form-group">
                                <label>
                                    <input value="Login" class="btn btn-primary" type="submit">
                                </label>
                                <label>
                                    <input type="checkbox" name="remember">
                                    Remember me
                                </label>
                                
                                
                                <label>
                                    <a href="#">Lost your password?</a></label>
                            </div>

                        </form>
                    </div>
                </div>
                @endif
                <!--Accordion End-->
                <!--Accordion Start-->
                <!-- <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                            <div id="checkout_coupon" class="coupon-checkout-content">
                                <div class="coupon-info">
                                    <form action="#">
                                        <p class="checkout-coupon">
                                            <input placeholder="Coupon code" type="text">
                                            <input value="Apply Coupon" type="submit">
                                        </p>
                                    </form>
                                </div>
                            </div> -->
                <!--Accordion End-->
            </div>
        </div>
    </div>
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
    <div class="row px-xl-5">
        <form action="{{ route('checkout.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="checkbox-form">
                        <h3>Billing Details</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>First Name <span class="required">*</span></label>
                                    <input placeholder="" type="text" name="first_name" required
                                        value="{{ (Auth::user()) ? Auth::user()->first_name : '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Last Name <span class="required">*</span></label>
                                    <input placeholder="" type="text" name="last_name" required
                                        value="{{ (Auth::user()) ? Auth::user()->last_name : '' }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Address <span class="required">*</span></label>
                                    <input placeholder="Street address" type="text" name="address_1" required
                                        value="{{ (Auth::user()) ? Auth::user()->address_1 : '' }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <input placeholder="Apartment, suite, unit etc. (optional)" type="text" name="address_2"
                                        value="{{ (Auth::user()) ? Auth::user()->address_2 : '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Town / City <span class="required">*</span></label>
                                    <input type="text" name="city" required
                                        value="{{ (Auth::user()) ? Auth::user()->city : '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Postcode / Zip <span class="required">*</span></label>
                                    <input placeholder="" type="text" name="zip" required
                                        value="{{ (Auth::user()) ? Auth::user()->zip : '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="text" name="phone" required
                                        value="{{ (Auth::user()) ? Auth::user()->phone : '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input placeholder="" type="email" name="email" required
                                        value="{{ (Auth::user()) ? Auth::user()->email : '' }}">
                                </div>
                            </div>
                            @if(!Auth::user())
                            <div class="col-md-12">
                                <div class="checkout-form-list create-acc">
                                    <input name="check_pass" type="hidden" value="0">
                                    <input id="cbox" name="check_pass" type="checkbox" value="1">
                                    <label>Create an account?</label>
                                </div>
                                <div id="cbox-info" class="checkout-form-list create-account">
                                    <p>Create an account by entering the information below. If you are a returning customer
                                        please login at the top of the page.</p>
                                    <label>Account password <span class="required">*</span></label>
                                    <input placeholder="password" type="password" name="password">
                                </div>
                            </div>
                            @endif
                        </div>
                        <!-- <div class="different-address">
                                        <div class="ship-different-title">
                                            <h3>
                                                <label>Ship to a different address?</label>
                                                <input id="ship-box" type="checkbox">
                                            </h3>
                                        </div>
                                        <div id="ship-box-info" class="row">
                                            <div class="col-md-12">
                                                <div class="country-select clearfix">
                                                    <label>Country <span class="required">*</span></label>
                                                    <select class="nice-select wide">
                                                        <option data-display="Bangladesh">Bangladesh</option>
                                                        <option value="uk">London</option>
                                                        <option value="rou">Romania</option>
                                                        <option value="fr">French</option>
                                                        <option value="de">Germany</option>
                                                        <option value="aus">Australia</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <label>First Name <span class="required">*</span></label>
                                                    <input placeholder="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <label>Last Name <span class="required">*</span></label>
                                                    <input placeholder="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <label>Company Name</label>
                                                    <input placeholder="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <label>Address <span class="required">*</span></label>
                                                    <input placeholder="Street address" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <label>Town / City <span class="required">*</span></label>
                                                    <input type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <label>State / County <span class="required">*</span></label>
                                                    <input placeholder="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <label>Postcode / Zip <span class="required">*</span></label>
                                                    <input placeholder="" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <label>Email Address <span class="required">*</span></label>
                                                    <input placeholder="" type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <label>Phone  <span class="required">*</span></label>
                                                    <input type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="order-notes">
                                            <div class="checkout-form-list">
                                                <label>Order Notes</label>
                                                <textarea id="checkout-mess" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                            </div>
                                        </div>
                                    </div> -->
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="your-order">
                        <h3>Your order</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-product-name">Product</th>
                                        <th class="cart-product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $total = 0;
                                    @endphp
                                    @foreach ($cart_data as $id=>$row)
                                    <tr class="cart_item">
                                        <td class="cart-product-name"> {{ $row['pro_name'] }}<strong class="product-quantity"> ×
                                                {{ $row['pro_quantity'] }}</strong></td>
                                        <td class="cart-product-total"><span class="amount">৳{{ ($row['pro_sale_price'] *
                                                $row['pro_quantity']) }}</span></td>
                                        <input type="hidden" name="id[]" value="{{ $id }}">
                                        <input type="hidden" name="pro_name[]" value="{{ $row['pro_name'] }}">
                                        <input type="hidden" name="pro_quantity[]" value="{{ $row['pro_quantity'] }}">
                                        <input type="hidden" name="pro_main_image[]" value="{{ $row['pro_main_image'] }}">
                                        <input type="hidden" name="pro_url[]" value="{{ $row['pro_url'] }}">
                                        <input type="hidden" name="pro_sale_price[]"
                                            value="{{ ($row['pro_sale_price'] * $row['pro_quantity']) }}">
                                    </tr>
                                    @php
                                    $total += ($row['pro_sale_price'] * $row['pro_quantity']);
                                    @endphp
                                    @endforeach
                                    <input type="hidden" name="total_price" value="{{ $total }}">
                                </tbody>
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Cart Subtotal</th>
                                        <td><span class="amount">৳{{ $total }}</span></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td><strong><span class="amount">৳{{ $total }}</span></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <!-- <div id="accordion">
                                                <div class="card">
                                                <div class="card-header" id="#payment-1">
                                                    <h5 class="panel-title">
                                                    <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Direct Bank Transfer.
                                                    </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                    <div class="card-body">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="card">
                                                <div class="card-header" id="#payment-2">
                                                    <h5 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Cheque Payment
                                                    </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                                    <div class="card-body">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="card">
                                                <div class="card-header" id="#payment-3">
                                                    <h5 class="panel-title">
                                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        PayPal
                                                    </a>
                                                    </h5>
                                                </div>
                                                <div id="collapseThree" class="collapse" data-parent="#accordion">
                                                    <div class="card-body">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                    </div>
                                                </div>
                                                </div>
                                            </div> -->
                                <div class="order-button-payment">
                                    <input value="Place order" class="btn btn-primary" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--
        <div class="col-lg-8">
            <div class="mb-4">

                <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>First Name</label>
                        <input class="form-control" type="text" placeholder="John">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Last Name</label>
                        <input class="form-control" type="text" placeholder="Doe">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input class="form-control" type="text" placeholder="example@email.com">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Mobile No</label>
                        <input class="form-control" type="text" placeholder="+123 456 789">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address Line 1</label>
                        <input class="form-control" type="text" placeholder="123 Street">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address Line 2</label>
                        <input class="form-control" type="text" placeholder="123 Street">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Country</label>
                        <select class="custom-select">
                            <option selected>United States</option>
                            <option>Afghanistan</option>
                            <option>Albania</option>
                            <option>Algeria</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>City</label>
                        <input class="form-control" type="text" placeholder="New York">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>State</label>
                        <input class="form-control" type="text" placeholder="New York">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>ZIP Code</label>
                        <input class="form-control" type="text" placeholder="123">
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="newaccount">
                            <label class="custom-control-label" for="newaccount">Create an account</label>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="shipto">
                            <label class="custom-control-label" for="shipto" data-toggle="collapse"
                                data-target="#shipping-address">Ship to different address</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse mb-4" id="shipping-address">
                <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>First Name</label>
                        <input class="form-control" type="text" placeholder="John">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Last Name</label>
                        <input class="form-control" type="text" placeholder="Doe">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input class="form-control" type="text" placeholder="example@email.com">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Mobile No</label>
                        <input class="form-control" type="text" placeholder="+123 456 789">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address Line 1</label>
                        <input class="form-control" type="text" placeholder="123 Street">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address Line 2</label>
                        <input class="form-control" type="text" placeholder="123 Street">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Country</label>
                        <select class="custom-select">
                            <option selected>United States</option>
                            <option>Afghanistan</option>
                            <option>Albania</option>
                            <option>Algeria</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>City</label>
                        <input class="form-control" type="text" placeholder="New York">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>State</label>
                        <input class="form-control" type="text" placeholder="New York">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>ZIP Code</label>
                        <input class="form-control" type="text" placeholder="123">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                </div>
                <div class="card-body">
                    <h5 class="font-weight-medium mb-3">Products</h5>
                    <div class="d-flex justify-content-between">
                        <p>Colorful Stylish Shirt 1</p>
                        <p>$150</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Colorful Stylish Shirt 2</p>
                        <p>$150</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p>Colorful Stylish Shirt 3</p>
                        <p>$150</p>
                    </div>
                    <hr class="mt-0">
                    <div class="d-flex justify-content-between mb-3 pt-1">
                        <h6 class="font-weight-medium">Subtotal</h6>
                        <h6 class="font-weight-medium">$150</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Shipping</h6>
                        <h6 class="font-weight-medium">$10</h6>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold">$160</h5>
                    </div>
                </div>
            </div>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Payment</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="paypal">
                            <label class="custom-control-label" for="paypal">Paypal</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                            <label class="custom-control-label" for="directcheck">Direct Check</label>
                        </div>
                    </div>
                    <div class="">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                            <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                </div>
            </div>
        </div>-->
    </div>
</div>
<!-- Checkout End -->
@endsection
@section('extrajs')
<script>
    /*----------------------------------------*/
    /* 14. Toggle Function Active
    /*----------------------------------------*/
    // showlogin toggle
    $(document).ready(function () { 
       
        $('#showlogin').on('click', function() {
        $('#checkout-login').slideToggle(900);
        });
        // showlogin toggle
        $('#showcoupon').on('click', function() {
        $('#checkout_coupon').slideToggle(900);
        });
        // showlogin toggle
        $('#cbox').on('click', function() {
        $('#cbox-info').slideToggle(900);
        });
        
        // showlogin toggle
        $('#ship-box').on('click', function() {
        $('#ship-box-info').slideToggle(1000);
        });
    });



</script>
@endsection