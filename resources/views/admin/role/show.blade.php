@extends('admin.layouts.master')

@section('content')
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Role Information</h1>
            </ul>

        </nav>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card card-default color-palette-box">
            <div class="card-header">
                <h3 class="card-title">
                    <h5><b>Role Name:</b> {{ $role_info->name }}</h5>
                </h3>
            </div>

            @can('role-view')
                <div class="card-body">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="text-center">
                                <h4>Permissions</h4>
                            </div>
                            <hr>

                            <div class="row">
                                @foreach($permissiontypes as $permissiontype)
                                <div class="col-md-12 mb-3">
                                    <h5><u>{{ $permissiontype->type }}</u></h5>
                                    <div class="row">
                                        @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $value)
                                        @if($permissiontype->type == $value->type)
                                        <div class="col-md-2 table">
                                            <p class="">{{ $value->name }}</p>
                                        </div>
                                        @endif
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            @endcan

        </div>
    </div>
</section>
@endsection