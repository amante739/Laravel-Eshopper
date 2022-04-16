@extends('admin.layouts.master')

@section('content')
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <h1>Dashboard</h1>
            </ul>

        </nav>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        @can('dashboard-list')
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Admin's</span>
                                <span class="info-box-number">{{ $total_admin }}</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Registered User's</span>
                                <span class="info-box-number">{{ $total_user }}</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <a href="">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fab fa-product-hunt"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Product's</span>
                                <span class="info-box-number">{{ $total_product }}</span>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <a href="">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1">
                                <i class="fas fa-user-shield"></i>
                            </span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total Roles</span>
                                <span class="info-box-number">{{ $total_role }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endcan

    </div>
</section>
@endsection

@section('extracss')
<style>
    a,
    a:hover {
        color: inherit;
    }
</style>
@endsection