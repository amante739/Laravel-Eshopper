@extends('frontend.layouts.home_master')
@section('nav')

@include('frontend.layouts.partials.nav')
@endsection
@section('content')

<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Account</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="{{ url('/') }}">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Profile</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


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

                                        <form role="form" action="{{ route('account.update', $user_data->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="form-group row">
                                                <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $user_data['first_name'] }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $user_data['last_name'] }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="username" class="col-sm-2 col-form-label">UserName</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="username" id="username" value="{{ $user_data['username'] }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="phone" id="phone" value="{{ $user_data['phone'] }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="dob" class="col-sm-2 col-form-label">Date of Birth</label>
                                                <div class="col-sm-10">
                                                    <input type="date" class="form-control" name="dob" id="dob" value="{{ $user_data['dob'] }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="text" disabled class="form-control" id="email" value="{{ $user_data['email'] }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address_1" class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="address_1" id="address_1" value="{{ $user_data['address_1'] }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="address_2" class="col-sm-2 col-form-label"></label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="address_2" id="address_2" value="{{ $user_data['address_2'] }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="city" class="col-sm-2 col-form-label">City</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="city" id="city" value="{{ $user_data['city'] }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="zip" class="col-sm-2 col-form-label">ZIP</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="zip" id="zip" value="{{ $user_data['zip'] }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="zip" class="col-sm-2 col-form-label">Image</label>
                                                <div class="col-sm-5">
                                                    <input type="file" class="form-control" id="avatar" name="avatar">
                                                </div>
                                                <div class="col-sm-5">
                                                    <img style="height: 150px;width:150px;" id="usr_img" src="{{ asset('admin/dist/img/img_preview.png') }}" alt="your image" />
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

<script>
avatar.onchange = evt => {
  const [file] = avatar.files
  if (file) {
    usr_img.src = URL.createObjectURL(file)
  }
}
</script>

@endsection
