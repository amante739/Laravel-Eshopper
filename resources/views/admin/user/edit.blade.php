@extends('admin.layouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>User Update</h1>
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

                        @can('user-edit')
                        <form role="form" action="{{ route('user.update', $user->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">

                                        <div class="form-group">
                                            <label for="user_name">Admin Name</label>
                                            <input type="text" class="form-control" name="name" value="{{ $user->username }}" id="user_name" placeholder="Enter Name">
                                        </div>

                                        <div class="form-group">
                                            <label for="role_email">Email</label>
                                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" id="role_email" placeholder="Enter Email">
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" id="password">
                                        </div>

                                        <div class="form-group">
                                            <label for="password_confirm">Confirm Password</label>
                                            <input type="password" class="form-control" name="password_confirm" id="password_confirm">
                                        </div>

                                        <div class="form-group">
                                            <label for="permission_name">Check for permission</label>
                                        </div>

                                        @foreach($roles as $role)
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="roles[]" class="form-check-input" value="{{ $role->id }}" {{ in_array($role->name, $userRole) ? 'checked' : '' }}>{{ $role->name }}
                                            </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-success btn-sm">Update</button>
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