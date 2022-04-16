@extends('admin.layouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>FAQ Update</h1>
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

                        @can('faq-edit')
                        <form role="form" action="{{ route('faq.update', $faq_data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">

                                        <div class="form-group">
                                            <label for="faq_title">banner Title (Optional)</label>
                                            <input type="text" class="form-control" required name="faq_title" value="{{ $faq_data->faq_title }}" id="faq_title" placeholder="FAQ TITLE">
                                        </div>

                                        <div class="form-group">
                                            <label for="faq_description">FAQ Description</label>
                                            <textarea required name="faq_description" class="form-control" id="faq_description" cols="30" rows="10">{{ $faq_data->faq_description }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="faq_status">FAQ Status</label>
                                            <select class="form-control" name="faq_status">
                                                <option value="1" @if ($faq_data->faq_status==1) selected @endif>Published</option>
                                                <option value="0" @if ($faq_data->faq_status==0) selected @endif>Hidden</option>
                                            </select>
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
@endsection