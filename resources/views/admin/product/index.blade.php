@extends('admin.layouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Product</h1>
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
                        
                        @can('product-create')
                        <a href="{{ route('product.create') }}">
                            <button class="btn btn-success btn-sm float-right">
                                Add New
                            </button>
                        </a>
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

                        @can('product-list')
                        <table class="table table-bordered table-sm text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Stock Status</th>
                                    <th>Quantity</th>
                                    <th>SKU</th>
                                    <th>Order</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_product as $key => $product)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $product->pro_name }}</td>
                                    <td>{{ $product->pro_sale_price }}</td>
                                    <td>
                                        @if($product->pro_stock_status == 'in_stock')
                                        <label class="text-success">In Stock</label>
                                        @else
                                        <label class="text-danger">Stock Out</label>
                                        @endif
                                    </td>
                                    <td>{{ $product->pro_quantity }}</td>
                                    <td>{{ $product->pro_sku }}</td>
                                    <td>{{ $product->pro_order }}</td>
                                    <td>
                                        @if($product->pro_status == 'published')
                                        <label class="badge badge-success">Published</label>
                                        @else
                                        <label class="badge badge-danger">Hidden</label>
                                        @endif
                                    </td>
                                    <td>
                                        
                                        @can('product-edit')
                                        <a class="btn" data-toggle="tooltip" title="Edit Product" href="{{ route('product.edit', $product->id) }}">
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