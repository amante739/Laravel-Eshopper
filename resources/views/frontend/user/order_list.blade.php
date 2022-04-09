@extends('frontend.layouts.home_master')
@section('nav')

@include('frontend.layouts.partials.nav')
@endsection
@section('content')

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Account</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{ url('/') }}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">My Order List</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


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

<!-- Begin Li's Main Blog Page Area -->
<div class="li-main-blog-page li-main-blog-details-page pt-60 pb-60 pb-sm-45 pb-xs-45">
    <div class="container">
        <div class="row">

            @include('frontend.layouts.partials.account_left_bar')
            
            <!-- Begin Li's Main Content Area -->
            <div class="col-lg-9 order-lg-2 order-1">
                <div class="row li-main-content">
                    <div class="col-lg-12">

                        <div class="li-comment-section">
                            <ul>
                                <li>
                                    <div class="about-text-wrap btn-block">

                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order_list as $order)
                                                <tr>
                                                    <td>#00{{ $order->id }}</td>
                                                    <td>{{ date_format($order->created_at,"d F, Y") }}</td>
                                                    <td>{{ $order->sub_total }}</td>
                                                    <td>
                                                        @if($order->order_is_finished == 0)
                                                        <label class="text-warning">Pending</label>
                                                        @else
                                                        <label class="text-Success">Pending</label>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Li's Main Content Area End Here -->
        </div>
    </div>
</div>
<!-- Li's Main Blog Page Area End Here -->
@endsection
