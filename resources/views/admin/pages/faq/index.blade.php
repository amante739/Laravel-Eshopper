@extends('admin.layouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>FAQ</h1>
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
                        @can('faq-create')
                        <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#faqCreateModal">
                            Add New
                        </button>

                        <div class="modal fade" id="faqCreateModal" tabindex="-1" role="dialog" aria-labelledby="faqCreateModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('faq.store') }}" method="post">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="faqCreateModalLabel">Create New FAQ</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="faq-title" class="col-form-label">FAQ Title</label>
                                                <input type="text" class="form-control" required name="faq_title" id="faq-title">
                                            </div>
                                            <div class="form-group">
                                                <label for="faq-description" class="col-form-label">FAQ Description</label>
                                                <textarea class="form-control" required name="faq_description" id="faq-description"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-success" value="Create FAQ">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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

                        @can('faq-list')
                        <table class="table table-bordered table-sm text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_faq as $key => $faq)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $faq->faq_title }}</td>
                                    <td>{{ $faq->faq_description }}</td>
                                    <td>
                                        @if($faq->faq_status == 1)
                                        <label class="badge badge-success">Published</label>
                                        @else
                                        <label class="badge badge-danger">Hidden</label>
                                        @endif
                                    </td>
                                    <td style="width: 15%;">

                                        @can('faq-edit')
                                        <a class="btn" data-toggle="tooltip" title="Edit Faq"
                                            href="{{ route('faq.edit', $faq->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        @if($faq->faq_status == 1)
                                        <a class="btn" data-toggle="tooltip" title="Click to Hide"
                                            onclick="return confirm('Are you sure to hide this Faq?')"
                                            href="{{ url('faq/faq_status/'.$faq->id.'/0') }}">
                                            <i class="fas fa-toggle-on"></i>
                                        </a>
                                        @else
                                        <a class="btn" data-toggle="tooltip" title="Click to Publish"
                                            onclick="return confirm('Are you sure to publish this Faq?')"
                                            href="{{ url('faq/faq_status/'.$faq->id.'/1') }}">
                                            <i class="fas fa-toggle-off"></i>
                                        </a>
                                        @endif
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
