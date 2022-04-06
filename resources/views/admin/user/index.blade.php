@extends('admin.layouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>User</h1>
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
                        
                        @can('user-create')
                        <a href="{{ route('user.create') }}">
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

                        @can('user-list')
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $user->first_name.' '.$user->last_name }}</td>
                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $value)
                                        <label class="badge badge-success">{{ $value }}</label>
                                        @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        
                                    @can('user-edit')
                                        <a class="btn" href="{{ route('user.edit', $user->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <!-- <button type="button" class="btn btn-danger">Status</button> -->
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