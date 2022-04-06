@extends('frontend.layouts.home_master')

@section('content')

<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li class="active">Blog Details Left Sidebar</li>
            </ul>
        </div>
    </div>
</div>
<!-- Li's Breadcrumb Area End Here -->


    @if ($message = Session::get('error'))
    <div class="alert alert-danger text-center">
        <p><b>{{ $message }}</b></p>
    </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="alert alert-success text-center">
        <p><b>{{ $message }}</b></p>
    </div>
    @endif
    
<!-- Begin Li's Main Blog Page Area -->
<div class="li-main-blog-page li-main-blog-details-page pt-60 pb-60 pb-sm-45 pb-xs-45">
    <div class="container">
        <div class="row">
            @include('frontend.layouts.partials.account_left_bar')
            <!-- Begin Li's Main Content Area -->
            <div class="col-lg-9 order-lg-2 order-1">
                <div class="row li-main-content">
                    <div class="col-lg-12">

                        <div class="li-comment-section">
                            <ul>
                                <li>
                                    <div class="about-text-wrap btn-block">

                                        <form role="form" action="{{ url('update-password', $user_data->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')

                                            <div class="form-group row">
                                                <label for="password" class="col-sm-4 col-form-label">Password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control" name="password" id="password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password_confirm" class="col-sm-4 col-form-label">Confirm Password</label>
                                                <div class="col-sm-8">
                                                    <input type="password" class="form-control" name="password_confirm" id="password_confirm">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <input type="submit" class="btn btn-success" value="Update">
                                            </div>
                                        </form>


                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Li's Main Content Area End Here -->
        </div>
    </div>
</div>
<!-- Li's Main Blog Page Area End Here -->
@endsection
