@extends('frontend.layouts.home_master')
@section('content')

    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!--Checkout Area Strat-->
    <div class="checkout-area pt-60 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="coupon-accordion">
                        <!--Accordion Start-->
                        @if(!Auth::user())
                        <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                        <div id="checkout-login" class="coupon-content">
                            <div class="coupon-info">
                                <!-- <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p> -->
                                    <form action="{{ url('user/login/') }}" method="post">
                                    @csrf
                                    <p class="form-row-first">
                                        <label>Username or email <span class="required">*</span></label>
                                        <input type="text" name="email">
                                    </p>
                                    <p class="form-row-last">
                                        <label>Password  <span class="required">*</span></label>
                                        <input type="text" name="password">
                                    </p>
                                    <p class="form-row">
                                        <input value="Login" type="submit">
                                        <label>
                                            <input type="checkbox" name="remember">
                                                Remember me 
                                        </label>
                                    </p>
                                    <p class="lost-password"><a href="#">Lost your password?</a></p>
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
                                        <input placeholder="" type="text" name="first_name" required value="{{ (Auth::user()) ? Auth::user()->first_name : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input placeholder=""  type="text" name="last_name" required value="{{ (Auth::user()) ? Auth::user()->last_name : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input placeholder="Street address" type="text" name="address_1" required value="{{ (Auth::user()) ? Auth::user()->address_1 : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <input placeholder="Apartment, suite, unit etc. (optional)" type="text" name="address_2" value="{{ (Auth::user()) ? Auth::user()->address_2 : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Town / City <span class="required">*</span></label>
                                        <input type="text" name="city" required value="{{ (Auth::user()) ? Auth::user()->city : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input placeholder="" type="text" name="zip" required value="{{ (Auth::user()) ? Auth::user()->zip : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone  <span class="required">*</span></label>
                                        <input type="text" name="phone" required value="{{ (Auth::user()) ? Auth::user()->phone : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input placeholder="" type="email" name="email" required value="{{ (Auth::user()) ? Auth::user()->email : '' }}">
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
                                        <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                        <label>Account password  <span class="required">*</span></label>
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
                                            <td class="cart-product-name"> {{ $row['pro_name'] }}<strong class="product-quantity"> × {{ $row['pro_quantity'] }}</strong></td>
                                            <td class="cart-product-total"><span class="amount">৳{{ ($row['pro_sale_price'] * $row['pro_quantity']) }}</span></td>
                                            <input type="hidden" name="id[]" value="{{ $id }}">
                                            <input type="hidden" name="pro_name[]" value="{{ $row['pro_name'] }}">
                                            <input type="hidden" name="pro_quantity[]" value="{{ $row['pro_quantity'] }}">
                                            <input type="hidden" name="pro_main_image[]" value="{{ $row['pro_main_image'] }}">
                                            <input type="hidden" name="pro_url[]" value="{{ $row['pro_url'] }}">
                                            <input type="hidden" name="pro_sale_price[]" value="{{ ($row['pro_sale_price'] * $row['pro_quantity']) }}">
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
                                        <input value="Place order" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--Checkout Area End-->

@endsection