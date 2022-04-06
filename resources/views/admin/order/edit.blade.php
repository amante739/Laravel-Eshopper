@extends('admin.layouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Order Information</h1>
            </ul>

        </nav>
    </div>
</section>
<section class="content">
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">
                <div class="card">

                    @if (count($errors) > 0)
                    <div class="card-body">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>

        @can('order-edit')
        <div class="row">
            <div class="col-md-8">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Order Confirmation: <b>Order ID - #00{{ $order->id }}</b></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="order_is_confirmed" class="col-sm-4">Order Confirm Status</label>
                                <label class="col-sm-2">
                                    @if($order->order_is_confirmed == 0) <span class="text-danger">Pending</span> @else <span class="text-success">Completed</span> @endif
                                </label>
                                <label class="col-sm-6">
                                    @if($order->order_is_confirmed == 0)
                                    <a class="btn btn-warning float-right" data-toggle="tooltip" title="Click to Confirm" onclick="return confirm('Are you sure to confirm this Order ?')" href="{{ url('order/order_confirm/'.$order->id.'/1') }}">
                                        Confirm Order
                                    </a>
                                    @endif
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Order Details: <b>Order ID - #00{{ $order->id }}</b></h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <table>
                                <table class="table table-stripetable table-striped table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Product Quantity</th>
                                            <th>Product Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0 @endphp
                                        @foreach ($order_view as $val)
                                        <tr>
                                            <td class="li-product-thumbnail"><img style="width: 100px;" src="{{ asset('storage/'.$val['product_image']) }}" alt="Li's Product Image"></td>
                                            <td><a href="{{ $val['pro_url'] }}">{{ $val['product_name'] }}</a></td>
                                            <td>{{ $val['product_quantity'] }}</td>
                                            <td>
                                                {{ $val['product_price'] }}
                                                @php $total = $total + $val['product_price'] @endphp
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3" class="text-center">Total</th>
                                            <th>{{ $total }}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </table>
                        </div>

                    </div>
                </div>
                
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Order Information: <b>Order ID - #00{{ $order->id }}</b></h3>
                    </div>

                    <div class="card-body">

                        <div class="form-group row">
                            <label for="order_is_confirmed" class="col-sm-4">Order Complete Status</label>
                            <label class="col-sm-2">
                                @if($order->order_is_finished == 0) <span class="text-danger">Pending</span> @else <span class="text-success">Completed</span> @endif
                            </label>
                            <label class="col-sm-6">
                                @if($order->order_is_finished == 0)

                                    @if($order->order_is_confirmed == 0) 
                                        <span class="text-warning">Before Updating the Complete Status,<br> Please Update Order Confirm from the top !</span> 
                                    @else
                                        <a class="btn btn-warning float-right" data-toggle="tooltip" title="Click to Confirm" onclick="return confirm('Are you sure to confirm this Order ?')" href="{{ url('order/order_status/'.$order->id.'/1') }}">
                                            Complete Order
                                        </a>
                                    @endif
                                    
                                @endif
                            </label>
                        </div>

                    </div>
                </div>



            </div>

            <div class="col-md-4">

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Customer Information</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                @if ($order->user_id == 0)
                                    <label class="col-sm-12 text-center text-danger">
                                        This Customer is Unregistered
                                        <hr>
                                    </label>
                                @endif

                                <p for="order_is_confirmed" class="col-sm-5">Customer Name :</p>
                                <label class="col-sm-7">{{ $order->first_name.' '.$order->last_name }}</label>

                                <p for="order_is_confirmed" class="col-sm-5">Customer Phone :</p>
                                <label class="col-sm-7">{{ $order->phone }}</label>

                                <p for="order_is_confirmed" class="col-sm-5">Customer Email :</p>
                                <label class="col-sm-7">{{ $order->email }}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Shipping Address</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="form-horizontal">
                        <div class="card-body">
                            <div class="form-group row">
                                @if ($order->user_id == 0)
                                    <label class="col-sm-12 text-center text-danger">
                                        This Customer is Unregistered
                                        <hr>
                                    </label>
                                @endif

                                <p for="order_is_confirmed" class="col-sm-5">Customer Address :</p>
                                <label class="col-sm-7">{{ $order->address_1.' '.$order->address_2 }}</label>

                                <p for="order_is_confirmed" class="col-sm-5">Customer City :</p>
                                <label class="col-sm-7">{{ $order->city }}</label>

                                <p for="order_is_confirmed" class="col-sm-5">Customer ZIP :</p>
                                <label class="col-sm-7">{{ $order->zip }}</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary">Update Product</button>
                </div>
            </div>
        </div>
        @endcan

    </div>
</section>
@endsection