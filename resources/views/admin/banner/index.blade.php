@extends('admin.layouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Banner</h1>
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
                        
                        @can('banner-create')
                        <a href="{{ route('banners.create') }}">
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

                        @can('banner-list')
                        <table class="table table-bordered table-sm text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Banner</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_banner as $key => $banner)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $banner->banner_title }}</td>
                                    <td><img style="width:150px;" src="{{ asset('storage/'.$banner->banner_image) }}" alt="banner Image"></td>
                                    <td>
                                        @if($banner->banner_status == 1)
                                        <label class="badge badge-success">Published</label>
                                        @else
                                        <label class="badge badge-danger">Hidden</label>
                                        @endif
                                    </td>
                                    <td style="width: 15%;">

                                        @can('banner-edit')
                                            <a class="btn" data-toggle="tooltip" title="Edit banner" href="{{ route('banners.edit', $banner->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            @if($banner->banner_status == 1)
                                            <a class="btn" data-toggle="tooltip" title="Click to Hide" onclick="return confirm('Are you sure to hide this banner?')" href="{{ url('banner/banner_status/'.$banner->id.'/0') }}">
                                                <i class="fas fa-toggle-on"></i>
                                            </a>
                                            @else
                                            <a class="btn" data-toggle="tooltip" title="Click to Publish" onclick="return confirm('Are you sure to publish this banner?')" href="{{ url('banner/banner_status/'.$banner->id.'/1') }}">
                                                <i class="fas fa-toggle-off"></i>
                                            </a>
                                            @endif
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