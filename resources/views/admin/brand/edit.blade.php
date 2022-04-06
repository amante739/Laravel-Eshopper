@extends('admin.layouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Brand Update</h1>
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

                        @can('brand-edit')
                        <form role="form" action="{{ route('brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">

                                        <div class="form-group">
                                            <label for="brand_name">Brand Name</label>
                                            <input type="text" class="form-control" name="brand_name"
                                                value="{{ $brand->brand_name }}" id="brand_name"
                                                placeholder="Brand Name">
                                        </div>

                                        <div class="form-group">
                                            <label for="brand_description">Brand Description (Optional)</label>
                                            <textarea name="brand_description" class="form-control" id="brand_description"
                                                rows="8">{{ $brand->brand_description }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="brand_website">Brand Website (Optional)</label>
                                            <input type="text" class="form-control" name="brand_website"
                                                value="{{ $brand->brand_website }}" id="brand_website"
                                                placeholder="Brand Name">
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="brand_order">Brand Order</label>
                                                <input type="number" min="0" class="form-control" name="brand_order" value="{{ $brand->brand_order }}" id="brand_order">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="brand_is_featured">Is Featured</label>
                                                <select class="form-control" name="brand_is_featured">
                                                    <option value="0" @if ($brand->brand_is_featured==0) selected @endif>No</option>
                                                    <option value="1" @if ($brand->brand_is_featured==1) selected @endif>Yes</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="brand_status">Status</label>
                                                <select class="form-control" name="brand_status">
                                                    <option value="1" @if ($brand->brand_status==1) selected @endif>Published</option>
                                                    <option value="0" @if ($brand->brand_status==0) selected @endif>Hidden</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="brand_logo">Brand Logo (Optional)</label>
                                                <input type="file" class="form-control" id="brand_logo" name="brand_logo" placeholder="Brand Logo">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <img style="height: 150px;width:150px;" id="blah" src="{{ asset('admin/dist/img/img_preview.png') }}" alt="your image" />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-success btn-lg">Update</button>
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
brand_logo.onchange = evt => {
  const [file] = brand_logo.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>
@endsection
