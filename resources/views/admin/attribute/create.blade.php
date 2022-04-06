@extends('admin.layouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Attribute Create</h1>
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

                        @can('attribute-edit')
                        <form role="form" action="{{ route('attribute.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">

                                        <div class="form-group">
                                            <label for="attribute_name">Attribute Name</label>
                                            <input type="text" class="form-control" name="attribute_name" required value="" id="attribute_name" placeholder="Attribute Name">
                                        </div>

                                        <div class="form-group">
                                            <label for="attribute_slug">Attribute Slug</label>
                                            <input type="text" class="form-control" name="attribute_slug" value="" id="attribute_slug" placeholder="Attribute Slug">
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="attribute_order">Attribute Order</label>
                                                <input type="number" min="0" class="form-control" required name="attribute_order" value="0" id="attribute_order">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="attribute_display_layout">Display Layout</label>
                                                <select class="form-control" name="attribute_display_layout" required>
                                                    <option value="text">Text</option>
                                                    <option value="visual">Visual</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="attribute_status">Status</label>
                                                <select class="form-control" name="attribute_status" required>
                                                    <option value="1">Published</option>
                                                    <option value="0">Hidden</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="attribute_slug">Attribute Set List</label>
                                            <table class="table table-bordered table-stripped text-center" id="childTable">
                                                <thead>
                                                    <tr>
                                                        <td>Is Default?</td>
                                                        <td>Title</td>
                                                        <td>Slug (optional)</td>
                                                        <td>Color (optional)</td>
                                                        <!-- <td>Status</td> -->
                                                        <!-- <td>Image</td> -->
                                                        <td>Remove</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr id="inputFormRow">
                                                        
                                                    </tr>

                                                </tbody>
                                            </table>
                                            <button id="addRow" onclick="childrenRow()" type="button" class="btn btn-info">Add Attribute Set</button>
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
@endsection

@section('extrajs')

<script type="text/javascript">
    // add row
    var i = $('#childTable tr').length;

    function childrenRow() {
        var html = '';
        html += '<tr id="inputFormRow">';
        html += '<td>';
        html += '<div class="form-group clearfix">';
        html += '<div class="icheck-primary d-inline">';
        html += '<input type="radio" id="attributeIsDefault' + i + '" name="attribute_set_is_default[]" value="'+i+'">';
        html += '<label for="attributeIsDefault' + i + '">';
        html += '</label>';
        html += '</div>';
        html += '</div>';
        html += '</td>';
        html += '<td>';
        html += '<div class="form-group">';
        html += '<input type="text" class="form-control" required name="attribute_set_name[]" id="attribute_set_name">';
        html += '</div>';
        html += '</td>';
        html += '<td>';
        html += '<div class="form-group">';
        html += '<input type="text" class="form-control" name="attribute_set_slug[]" id="attribute_set_slug">';
        html += '</div>';
        html += '</td>';
        html += '<td>';
        html += '<div class="form-group">';
        html += '<div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="' + i + '">';
        html += '<input type="text" name="attribute_set_color[]" class="form-control color_change" data-original-title="" title="">';
        html += '<div class="input-group-append">';
        html += '<span class="input-group-text">';
        html += '<i class="fas fa-square color_palette"></i>';
        html += '</span>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</td>';
        html += '<td>';
        html += '<a class="btn" id="removeRow" data-toggle="tooltip" title="Delete Attribute set">';
        html += '<i class="fa fa-trash"></i>';
        html += '</a>';
        html += '</td>';
        html += '</tr>';

        $('#childTable').find('tbody').append(html);
        $('.my-colorpicker2').colorpicker();
        i++;
    }

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });
</script>

<script>
    //color picker with addon
    $('.my-colorpicker2').colorpicker();
    $(document).on('change', '.color_change', function () {
        $(this).closest('.color_change').next('.input-group-append').find("i").css("color", $(this).closest('.color_change').val());
    });
</script>
<script>
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
</script>
@endsection
