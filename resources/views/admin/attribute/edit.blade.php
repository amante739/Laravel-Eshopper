@extends('admin.layouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Attribute Update</h1>
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

                        @can('attribute-edit')
                        <form role="form" action="{{ route('attribute.update', $attribute->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">

                                        <div class="form-group">
                                            <label for="attribute_name">Attribute Name</label>
                                            <input type="text" class="form-control" name="attribute_name" required value="{{ $attribute->attribute_name }}" id="attribute_name" placeholder="Attribute Name">
                                        </div>

                                        <div class="form-group">
                                            <label for="attribute_slug">Attribute Slug</label>
                                            <input type="text" class="form-control" name="attribute_slug" value="{{ $attribute->attribute_slug }}" id="attribute_slug" placeholder="Attribute Slug">
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="attribute_order">Attribute Order</label>
                                                <input type="number" min="0" class="form-control" required name="attribute_order" value="{{ $attribute->attribute_order }}" id="attribute_order">
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="attribute_display_layout">Display Layout</label>
                                                <select class="form-control" name="attribute_display_layout" required>
                                                    <option value="text" @if ($attribute->attribute_display_layout=='text') selected @endif>Text</option>
                                                    <option value="visual" @if ($attribute->attribute_display_layout=='visual') selected @endif>Visual</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="attribute_status">Status</label>
                                                <select class="form-control" name="attribute_status" required>
                                                    <option value="1" @if ($attribute->attribute_status==1) selected @endif>Published</option>
                                                    <option value="0" @if ($attribute->attribute_status==0) selected @endif>Hidden</option>
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
                                                    @foreach ($attribute->attributesets as $key => $attrset)
                                                        <tr id="inputFormRow">
                                                            <td>
                                                                <div class="form-group clearfix">
                                                                    <div class="icheck-primary d-inline">
                                                                        <input type="radio" id="attributeIsDefault'.{{ $key+1 }}.'" name="attribute_set_is_default[]" value="{{ $key+1 }}" {{ $attrset->attribute_set_is_default == 1 ? 'checked' : '' }}>
                                                                        <label for="attributeIsDefault'.{{ $key+1 }}.'"></label>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" required value="{{ $attrset->attribute_set_name }}" name="attribute_set_name[]" id="attribute_set_name">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control" value="{{ $attrset->attribute_set_slug }}" name="attribute_set_slug[]" id="attribute_set_slug">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <div class="input-group my-colorpicker2 colorpicker-element"
                                                                        data-colorpicker-id="2">
                                                                        <input type="text" name="attribute_set_color[]" value="{{ $attrset->attribute_set_color }}" class="form-control color_change" data-original-title="" title="">

                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text">
                                                                                <i class="fas fa-square color_palette_1" {{ $attrset->rgb }}></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <!-- <td>
                                                                <div class="bootstrap-switch-null bootstrap-switch-undefined bootstrap-switch-undefined bootstrap-switch-undefined bootstrap-switch-undefined bootstrap-switch-undefined bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-animate bootstrap-switch-focused" style="width: 86px;">
                                                                    <div class="bootstrap-switch-container" style="width: 126px; margin-left: 0px;">
                                                                        <input type="checkbox" name="my-checkbox" checked="" data-bootstrap-switch="" data-off-color="danger" data-on-color="success">
                                                                    </div>
                                                                </div>
                                                            </td> -->
                                                            <!-- <td>
                                                                <div class="image-upload">
                                                                    <label for="brand_logo">
                                                                    <img id="blah" style="width: 50px;cursor:pointer;" src="{{ asset('admin/dist/img/img_preview.png') }}" alt="attribute set image" />
                                                                    </label>
                                                                    <input style="display: none;" id="brand_logo" name="attribute_set_image" type="file" />
                                                                </div>
                                                            </td> -->
                                                            <td>
                                                                <a class="btn" id="removeRow" data-toggle="tooltip" title="Delete Attribute set">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                            <button id="addRow" onclick="childrenRow()" type="button" class="btn btn-info">Add Attribute Set</button>
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
