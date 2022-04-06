@extends('admin.layouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Sub Category Create</h1>
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

                        @can('subcategory-create')
                        <form role="form" action="{{ route('subcategory.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">

                                        <div class="form-group">
                                            <label for="subcat_name">Sub Category Name</label>
                                            <input type="text" class="form-control" name="subcat_name" value="" id="subcat_name" placeholder="SubcCategory Name">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="subcat_order">Category Name</label>
                                            <select class="form-control" name="cat_id">
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="subcat_description">Sub Category Description (Optional)</label>
                                            <textarea name="subcat_description" class="form-control" id="subcat_description" rows="8"></textarea>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="subcat_order">Sub Category Order</label>
                                                <input type="number" min="0" class="form-control" name="subcat_order" value="0" id="subcat_order">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="subcat_is_featured">Is Featured</label>
                                                <select class="form-control" name="subcat_is_featured">
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="subcat_status">Status</label>
                                                <select class="form-control" name="subcat_status">
                                                    <option value="1">Published</option>
                                                    <option value="0">Hidden</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="subcat_image">Sub Category Image (Optional)</label>
                                                <input type="file" class="form-control" id="subcat_image" name="subcat_image" placeholder="Category Name">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <img style="height: 150px;width:150px;" id="blah" src="{{ asset('admin/dist/img/img_preview.png') }}" alt="your image" />
                                            </div>
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
subcat_image.onchange = evt => {
  const [file] = subcat_image.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>
@endsection
