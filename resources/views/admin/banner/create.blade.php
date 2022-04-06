@extends('admin.layouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Banner Create</h1>
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
                        <h3 class="card-title">Create</h3>
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

                        @can('banner-create')
                        <form role="form" action="{{ route('banners.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">

                                        <div class="form-group">
                                            <label for="banner_title">banner Title (Optional)</label>
                                            <input type="text" class="form-control" name="banner_title" id="banner_title" placeholder="banner Name">
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-8">
                                                <label for="banner_link">banner link (Optional)</label>
                                                <input type="text" class="form-control" name="banner_link" id="banner_link" placeholder="banner Name">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="banner_status">Status</label>
                                                <select class="form-control" name="banner_status">
                                                    <option value="1">Published</option>
                                                    <option value="0">Hidden</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="banner_image">banner Image (Optional)</label>
                                            <input type="file" class="form-control" id="banner_image" name="banner_image" placeholder="banner Name">
                                        </div>

                                        <div class="form-group">
                                            <img style="width:20%;" id="blah" src="{{ asset('admin/dist/img/img_preview.png') }}" alt="your image" />
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-success btn-lg">Create</button>
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

<script>
banner_image.onchange = evt => {
  const [file] = banner_image.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>
@endsection
