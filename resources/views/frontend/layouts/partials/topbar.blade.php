<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row bg-secondary py-2 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark" href="">FAQs</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Help</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Support</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark px-2" href="">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-dark px-2" href="">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-dark pl-2" href="">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span
                        class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            <form action="">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for products">
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>

        @php $total = 0 @endphp
        @foreach((array) session('cart') as $id => $details)
        @php $total = ($total + ($details['pro_sale_price'] * $details['pro_quantity'])) @endphp
        @endforeach
        <div class="col-lg-3 col-6 text-right">
            <a href="" class="btn border">
                <i class="fas fa-heart text-primary"></i>
                <span class="badge">0</span>
            </a>

            <span class="nav-item dropdown" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <a href="" class="btn border">
                    <span class="cart-item-count">{{ count((array)
                        session('cart')) }} <i class="fas fa-shopping-cart text-primary"></i></span>
                    <span class="badge">{{ $total }}</span><i class="fa fa-angle-down float-right mt-1"></i>
                </a>

            </span>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    @if(session('cart'))
                    <div class="card-body">
                       
                        <ul>
                        @foreach(session('cart') as $id => $details)
                        <li data-id="{{ $id }}" class="no-bullets">
                            
                                <!--<a href="{{ url($details['pro_url']) }}" class="minicart-product-image">
                                <img src="{{ asset('storage/'.$details['pro_main_image']) }}" alt="cart products">
                            </a>-->
                            
                                <span><h6><a href="{{ url($details['pro_url']) }}">{{ $details['pro_name'] }}</a></h6></span>
                                <span>৳{{ $details['pro_sale_price'] }} x {{ $details['pro_quantity'] }}</span>
                                <span>
                                <button class="btn btn-sm  close btn-minus remove-from-cart">
                                    <i class="fa fa-minus "></i>
                                </button>
                                </span>
                            
                        </li>
                        @endforeach
                        </ul>
                       
                       <!-- <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">{{ $total }}</h6>
                        </div>--->
                        <!--<div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>-->
                      
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Sub Total</h5>
                            <h5 class="font-weight-bold">{{ $total }}</h5>
                        </div>
                        <button class="btn btn-block btn-dark "><a href="{{ route('cart') }}" class="text-primary">
                            View Full Cart
                        </a></button>
                        <button class="btn btn-block btn-dark  "><a href="{{ route('checkout.index') }}" class="text-primary">
                            Checkout
                        </a></button>
                        
                           
                       
                    </div>
                </div>
                    @else
                    <div class="nav-item">
                        <a class="btn" style="background-color: #212529 !important;">
                            <span style="color: #ffff;background-color: #212529;">Your Cart is empty</span>
                        </a>
                    </div>
                    @endif
            </div>


        </div>
    </div>
</div>
<!-- Topbar End -->

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
                    id: ele.parents("li").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });
</script>
@endsection