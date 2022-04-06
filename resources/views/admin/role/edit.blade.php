@extends('admin.layouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Update</h1>
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
                        <h3 class="card-title">Edit</h3>
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

                        @can('role-edit')
                        <form role="form" action="{{ route('role.update', $role_info->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">

                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for="role_name">Name</label>
                                        <input type="text" class="form-control" name="name" id="role_name" value="{{ $role_info->name }}">
                                    </div>


                                    <div class="form-group">
                                        <label for="permission_name">Check for permission (</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input check" name="optradio"><b>Check All</b>
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input uncheck" name="optradio"><b>Uncheck All )</b>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        @foreach($permissiontypes as $permissiontype)
                                        <div class="col-md-12 mb-4">
                                            <h5><u>{{ $permissiontype->type }}</u></h5>
                                            <div class="row">
                                                @foreach($permissions as $permission)
                                                @if($permissiontype->type == $permission->type)
                                                <div class="col-md-3">
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label">
                                                            <input type="checkbox" name="permission[]" class="form-check-input checky" value="{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>{{ $permission->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                </div>
                            </div>

                        </form>
                        @endcan
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('extrajs')
<script>
    $(document).ready(function() {
        $(".check").click(function() {
            $(".checky").prop("checked", true);
        });
        $(".uncheck").click(function() {
            $(".checky").prop("checked", false);
        });
    });
</script>
@endsection