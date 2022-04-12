@extends('frontend.layouts.home_master')
@section('nav')

@include('frontend.layouts.partials.nav')
@endsection
@section('content')

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Cart Details</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{ url('/') }}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Cart</p>
        </div>
    </div>
</div>
<!-- Page Header End -->
<!-- Cart Start -->
<div class="container-fluid pt-5">
    <form action="{{ route('update.cart') }}" method="post">
        @csrf
        @method('PUT')
        <div class="row px-xl-5">

            <div class="col-lg-8 table-responsive mb-5">


                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @php
                        $total = 0;
                        @endphp
                        @foreach ($cart_data as $id =>$cart)
                        <tr data-id="{{ $id }}">
                            <td class="align-middle">

                                <a href="{{ url($cart['pro_url']) }}">{{ $cart['pro_name'] }}</a>
                            </td>
                            <td class="align-middle">
                                <a href="{{ url($cart['pro_url']) }}"><img style="width: 150px;"
                                        src="{{ asset('storage/'.$cart['pro_main_image']) }}"
                                        alt="Li's Product Image"></a>

                            </td>

                            <td class="align-middle"><span class="amount">৳{{ $cart['pro_sale_price'] }}</span></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input
                                        class="cart-plus-minus-box quantity form-control form-control-sm bg-secondary text-center"
                                        name="pro_quantity[]" value="{{ $cart['pro_quantity'] }}" type="text">
                                    <!--<input type="text" class="form-control form-control-sm bg-secondary text-center" value="1">-->
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle"><span class="amount">৳{{ ($cart['pro_sale_price'] *
                                    $cart['pro_quantity']) }}</span< /td>
                            <td class="align-middle remove-from-cart"><button class="btn btn-sm btn-primary"><i
                                        class="fa fa-times"></i></button></td>
                                      


                        </tr>
                        <input type="hidden" name="pro_id[]" value="{{ $id }}">
                        @php
                        $total += ($cart['pro_sale_price'] * $cart['pro_quantity']);
                        @endphp
                        @endforeach



                    </tbody>
                </table>

            </div>
            <div class="col-lg-4">

                <div class="input-group mb-5">
                    <input type="text" class="form-control p-4" placeholder="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>

                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">৳{{ $total }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">৳{{ $total }}</h5>
                        </div>
                        <button class="btn btn-block btn-dark btn-primary my-3 py-3"><a href="{{ route('checkout.index') }}">Proceed to checkout</a></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Cart End -->
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