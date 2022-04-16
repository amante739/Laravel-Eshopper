@extends('admin.layouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Tag</h1>
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
                        @can('tag-create')
                        <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#faqCreateModal">
                            Add New
                        </button>

                        <div class="modal fade" id="faqCreateModal" tabindex="-1" role="dialog" aria-labelledby="tagCreateModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('tag.store') }}" method="post">
                                        @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="tagCreateModalLabel">Create New Tag</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="tag-title" class="col-form-label">Tag Title</label>
                                                <input type="text" class="form-control" required name="tag_title" id="tag-title">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-success" value="Create Tag">
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

                        @can('tag-list')
                        <table class="table table-bordered table-sm text-center">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_tag as $key => $tag)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $tag->tag_title }}</td>
                                    <td style="width: 15%;">

                                        @can('tag-edit')
                                        <a class="btn" data-toggle="tooltip" title="Edit Faq"
                                            href="{{ route('tag.edit', $tag->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
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
