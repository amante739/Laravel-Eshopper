@extends('admin.layouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Settings</h1>
            </ul>

        </nav>
    </div>
</section>
<section class="content">
    <div class="container-fluid">

        <div class="row">

            <div class="col-md-12">
                <div class="card">
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

                        @can('settings-list')

                            @can('settings-edit')
                            <form role="form" action="{{ route('settings.update', $settings->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                            @endcan

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">

                                            <div class="form-group">
                                                <label for="site_description">Description</label>
                                                <textarea name="site_description" class="form-control" id="site_description"
                                                    rows="8">{{ $settings->site_description }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="site_address">Address</label>
                                                <input type="text" class="form-control" name="site_address"
                                                    value="{{ $settings->site_address }}" id="site_address"
                                                    placeholder="Facebook page URL">
                                            </div>

                                            <div class="form-group">
                                                <label for="site_phone">Phone</label>
                                                <input type="text" class="form-control" name="site_phone"
                                                    value="{{ $settings->site_phone }}" id="site_phone"
                                                    placeholder="Facebook page URL">
                                            </div>

                                            <div class="form-group">
                                                <label for="site_email">Email</label>
                                                <input type="text" class="form-control" name="site_email"
                                                    value="{{ $settings->site_email }}" id="site_email"
                                                    placeholder="Facebook page URL">
                                            </div>

                                            <div class="form-group">
                                                <label for="site_facebook">Facebook URl</label>
                                                <input type="text" class="form-control" name="site_facebook"
                                                    value="{{ $settings->site_facebook }}" id="site_facebook"
                                                    placeholder="Facebook page URL">
                                            </div>

                                            <div class="form-group">
                                                <label for="site_map">Site Map</label>
                                                <input type="text" class="form-control" name="site_map"
                                                    value="{{ $settings->site_map }}" id="site_map"
                                                    placeholder="Facebook page URL">
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="logo">Logo</label>
                                                    <input type="file" class="form-control" id="logo" name="logo" placeholder="Logo">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <img style="height: 150px;width:150px;" id="blah" src="{{ asset('admin/dist/img/img_preview.png') }}" alt="your image" />
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    
                                    @can('settings-edit')
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-success btn-lg">Update</button>
                                    </div>
                                    @endcan
                                    
                                </div>
                                
                            @can('settings-edit')
                            </form>
                            @endcan

                        @endcan

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
logo.onchange = evt => {
  const [file] = logo.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>
@endsection
