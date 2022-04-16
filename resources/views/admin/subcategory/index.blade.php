@extends('admin.layouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Sub Category</h1>
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
                        
                        @can('subcategory-create')
                        <a href="{{ route('subcategory.create') }}">
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

                        @can('subcategory-list')
                        <table class="table table-bordered table-sm text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Sub Category</th>
                                    <th>Image</th>
                                    <th>Order</th>
                                    <th>is Featured</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_sub_category as $key => $subcategory)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $subcategory->subcat_name }}</td>
                                    <td>{{ $subcategory->category->cat_name }}</td>
                                    <td><img style="height: 100px;width:100px;" src="{{ asset('storage/'.$subcategory->subcat_image) }}" alt="Sub Category Image"></td>
                                    <td>{{ $subcategory->subcat_order }}</td>
                                    <td>
                                        @if($subcategory->subcat_is_featured == 1)
                                        <label class="badge badge-success">YES</label>
                                        @else
                                        <label class="badge badge-danger">NO</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if($subcategory->subcat_status == 1)
                                        <label class="badge badge-success">Published</label>
                                        @else
                                        <label class="badge badge-danger">Hidden</label>
                                        @endif
                                    </td>
                                    <td style="width: 15%;">
                                        
                                        @can('subcategory-edit')
                                            <a class="btn" data-toggle="tooltip" title="Edit Sub Category" href="{{ route('subcategory.edit', $subcategory->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            @if($subcategory->subcat_status == 1)
                                            <a class="btn" data-toggle="tooltip" title="Click to Hide" onclick="return confirm('Are you sure to hide this Subcategory?')" href="{{ url('subcategory/subcat_status/'.$subcategory->id.'/0') }}">
                                                <i class="fas fa-toggle-on"></i>
                                            </a>
                                            @else
                                            <a class="btn" data-toggle="tooltip" title="Click to Publish" onclick="return confirm('Are you sure to publish this Subcategory?')" href="{{ url('subcategory/subcat_status/'.$subcategory->id.'/1') }}">
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
                            {!! $all_sub_category->links() !!}
                        </div>
                        @endcan

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection