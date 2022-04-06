@extends('admin.layouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Order</h1>
            </ul>

        </nav>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List</h3>
                        
                        @can('order-create')
                        <!-- <a href="{{ route('order.create') }}">
                            <button class="btn btn-success btn-sm float-right">
                                Add New
                            </button>
                        </a> -->
                        @endcan
                        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (count($errors) > 0)
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
                        @endif

                        @can('order-list')
                        <table class="table table-bordered table-sm text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Amount</th>
                                    <th>Confirm Order</th>
                                    <th>Order Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_order as $key => $order)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $order->first_name.' '.$order->last_name }}</td>
                                    <td>{{ $order->sub_total }}</td>
                                    <td>
                                        @if($order->order_is_confirmed == 1)
                                        <label class="text-success">Confirmed</label>
                                        @else
                                        <label class="text-warning">Pending</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if($order->order_is_finished == 1)
                                        <label class="text-success">Completed</label>
                                        @else
                                        <label class="text-danger">Pending</label>
                                        @endif
                                    </td>
                                    <td>
                                        
                                        @can('order-edit')
                                            <a class="btn" data-toggle="tooltip" title="Edit Order" href="{{ route('order.edit', $order->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endcan

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection