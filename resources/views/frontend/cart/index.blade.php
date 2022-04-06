@extends('frontend.layouts.home_master')
@section('content')

        <!-- Begin Li's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!--Shopping Cart Area Strat-->
        <div class="Shopping-cart-area pt-60 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('update.cart') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="table-content table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="li-product-remove">remove</th>
                                            <th class="li-product-thumbnail">images</th>
                                            <th class="cart-product-name">Product</th>
                                            <th class="li-product-price">Unit Price</th>
                                            <th class="li-product-quantity">Quantity</th>
                                            <th class="li-product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($cart_data as $id =>$cart)
                                        <tr data-id="{{ $id }}">
                                            <td class="li-product-remove remove-from-cart"><a href="#"><i class="fa fa-times"></i></a></td>
                                            <td class="li-product-thumbnail"><a href="{{ url($cart['pro_url']) }}"><img style="width: 150px;" src="{{ asset('storage/'.$cart['pro_main_image']) }}" alt="Li's Product Image"></a></td>
                                            <td class="li-product-name"><a href="{{ url($cart['pro_url']) }}">{{ $cart['pro_name'] }}</a></td>
                                            <td class="li-product-price"><span class="amount">৳{{ $cart['pro_sale_price'] }}</span></td>
                                            <td class="quantity">
                                                <label>Quantity</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box quantity" name="pro_quantity[]" value="{{ $cart['pro_quantity'] }}" type="text">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-downt"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><span class="amount">৳{{ ($cart['pro_sale_price'] * $cart['pro_quantity']) }}</span></td>
                                        </tr>
                                        <input type="hidden" name="pro_id[]" value="{{ $id }}">
                                        @php
                                            $total += ($cart['pro_sale_price'] * $cart['pro_quantity']);
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="coupon-all">
                                        <div class="coupon">
                                            <!-- <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                            <input class="button" name="apply_coupon" value="Apply coupon" type="submit"> -->
                                        </div>
                                            @if (count($cart_data) > 0)
                                            <div class="coupon2">
                                                    <input class="button" value="Update cart" type="submit">
                                            </div>
                                            @else
                                            <div class="cart-page-total">
                                                <a href="{{ url('/') }}">Return Back</a>
                                            </div>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>Cart totals</h2>
                                        <ul>
                                            <li>Subtotal <span>৳{{ $total }}</span></li>
                                            <li>Total <span>৳{{ $total }}</span></li>
                                        </ul>
                                        <a href="{{ route('checkout.index') }}">Proceed to checkout</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--Shopping Cart Area End-->
@endsection
@section('extrajs')
<script>


    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route("remove.from.cart") }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
</script>
@endsection