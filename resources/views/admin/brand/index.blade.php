@extends('admin.layouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Brand</h1>
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
                        
                        @can('brand-create')
                        <a href="{{ route('brand.create') }}">
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

                        @can('brand-list')
                        <table class="table table-bordered table-sm text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Order</th>
                                    <th>is Featured</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_brand as $key => $brand)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td><img style="height: 100px;width:100px;" src="{{ asset('storage/'.$brand->brand_logo) }}" alt="Brand Image"></td>
                                    <td>{{ $brand->brand_order }}</td>
                                    <td>
                                        @if($brand->brand_is_featured == 1)
                                        <label class="badge badge-success">YES</label>
                                        @else
                                        <label class="badge badge-danger">NO</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if($brand->brand_status == 1)
                                        <label class="badge badge-success">Published</label>
                                        @else
                                        <label class="badge badge-danger">Hidden</label>
                                        @endif
                                    </td>
                                    <td style="width: 15%;">

                                        @can('brand-edit')
                                            <a class="btn" data-toggle="tooltip" title="Edit Brand" href="{{ route('brand.edit', $brand->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            @if($brand->brand_status == 1)
                                            <a class="btn" data-toggle="tooltip" title="Click to Hide" onclick="return confirm('Are you sure to hide this Brand?')" href="{{ url('brand/brand_status/'.$brand->id.'/0') }}">
                                                <i class="fas fa-toggle-on"></i>
                                            </a>
                                            @else
                                            <a class="btn" data-toggle="tooltip" title="Click to Publish" onclick="return confirm('Are you sure to publish this Brand?')" href="{{ url('brand/brand_status/'.$brand->id.'/1') }}">
                                                <i class="fas fa-toggle-off"></i>
                                            </a>
                                            @endif
                                        @endcan
                                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center mt-4">
                            {!! $all_brand->links() !!}
                        </div>
                        @endcan

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection