@extends('admin.layouts.master')

@section('content')
<!-- Default box -->
<section class="content-header">
    <div class="col-12 col-md-12">
        <nav class="navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <h1>Product Update</h1>
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
                    @if (count($errors) > 0)
                    <div class="card-body">
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
                    </div>
                    @endif
                </div>
            </div>

        </div>
        @can('product-edit')
        <form role="form" action="{{ route('product.update', $product->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Product General Information</h3>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="pro_name">Product Name</label>
                                <input type="text" value="{{ $product->pro_name }}" name="pro_name" required
                                    class="form-control" id="pro_name" placeholder="Enter Product Name">
                            </div>

                            <div class="form-group">
                                <label for="pro_description">Product Description</label>
                                <textarea class="summernote"
                                    name="pro_description">{{ $product->pro_description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="pro_content">Product Content</label>
                                <textarea class="summernote" name="pro_content">{{ $product->pro_content }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Image upload</h3>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="pro_image">Product Image</label>
                                <div>
                                    <a class="btn btn-success mb-2" href="javascript:void(0)"
                                        onclick="$('#pro_image').click()">Add Multiple Images</a>
                                    <input type="file" id="pro_image" name="pro_images[]" style="display: none;"
                                        class="form-control" multiple>
                                </div>
                                <div class="preview-images-zone">
                                    @if ($images)
                                    @foreach ($images as $key => $image)
                                    <div class="preview-image preview-show-{{$key}}">
                                        <div class="image-cancel" data-no="{{$key}}">x</div>
                                        <div class="image-zone">
                                            <img id="pro-img-{{$key}}" src="{{ asset('storage/app/public/'.$image) }}">
                                            <input type="fiie" style="display: none;" name="pro_old_images[]"
                                                value="{{$image}}">
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Product Variation</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                @foreach ($all_attribute as $key => $attribute)
                                <div class="col-md-12 mb-4">
                                    @php $count = 0 @endphp
                                    @foreach ($product_variations as $var_key => $var)
                                    @if($var['key'] == $attribute->id)
                                    @php $count = 1 @endphp
                                    @endif
                                    @endforeach
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" @if($count==1) checked @endif
                                            value="{{ $attribute->id }}" name="attribute{{ $key }}" type="checkbox"
                                            id="attr{{ $key }}">
                                        <label for="attr{{$key}}" class="custom-control-label">{{
                                            $attribute->attribute_name }}</label>
                                    </div>

                                    <div class="row mt-2">
                                        @foreach($attribute->attributesets as $newkey => $subattr)

                                        @php $data = 0 @endphp
                                        @foreach ($product_variations as $var_key => $var)
                                        @if($var['key'] == $attribute->id && in_array($subattr->id, $var['value']))
                                        @php $data = 1 @endphp
                                        @endif
                                        @endforeach

                                        <div class="col-md-3 mb-2">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="subattribute{{ $key }}[]"
                                                        class="form-check-input checky" value="{{ $subattr->id }}"
                                                        @if($data==1) checked @endif>{{ $subattr->attribute_set_name }}
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                                @endforeach

                            </div>
                        </div>

                    </div>



                </div>

                <div class="col-md-4">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Status</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Select</label>
                                <select class="form-control" required name="pro_status">
                                    <option value="published" @if ($product->pro_status == 'published') selected
                                        @endif>Published</option>
                                    <option value="draft" @if ($product->pro_status == 'draft') selected @endif>Draft
                                    </option>
                                    <option value="pending" @if ($product->pro_status == 'pending') selected
                                        @endif>Pending</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Pricing</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" required name="pro_quantity" value="{{ $product->pro_quantity }}"
                                    class="form-control" step="1" min="0">
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Buying Price</label>
                                    <input type="number" required name="pro_buy_price"
                                        value="{{ $product->pro_buy_price }}" class="form-control" step=".50" min="0">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Selling Price</label>
                                    <input type="number" required name="pro_sale_price"
                                        value="{{ $product->pro_sale_price }}" class="form-control" step=".50" min="0">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Discount (amount)</label>
                                <input type="number" required name="pro_discount" value="{{ $product->pro_discount }}"
                                    class="form-control" step=".50" min="0">
                            </div>
                        </div>
                    </div>

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Is Featured</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="custom-control custom-switch custom-switch-on-success">
                                    <input type="hidden" name="pro_is_featured" value="0">
                                    <input type="checkbox" value="1" @if ($product->pro_is_featured == 1) checked @endif
                                    name="pro_is_featured" class="custom-control-input" id="pro_is_featured">
                                    <label class="custom-control-label" for="pro_is_featured"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Category</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="category_id">Select Category</label>
                                <select class="form-control" required id="category_id" required name="category_id">
                                    <option value="">Choose Category</option>
                                    @foreach ($all_category as $category)
                                    <option value="{{ $category->id }}" @if ($category->id == $product->category_id)
                                        selected @endif>{{ $category->cat_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="subcategory_id">Select Sub-Category</label>
                                <select id="subcategory_id" required name="subcategory_id" class="form-control">
                                    @foreach ($all_subcategory as $subcategory)
                                    <option value="{{ $subcategory->id }}" @if ($subcategory->id ==
                                        $product->subcategory_id) selected @endif>{{ $subcategory->subcat_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>


                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Brand</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Select Brand</label>
                                <select class="form-control" name="brand_id">
                                    @foreach ($all_brand as $brand)
                                    <option value="{{ $brand->id }}" @if ($brand->id == $product->brand_id) selected
                                        @endif>{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Product Collections</h3>
                        </div>
                        <div class="card-body">
                            <!--<div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="newarrival">
                                    <label for="newarrival" class="custom-control-label">New Arrival</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="bestseller">
                                    <label for="bestseller" class="custom-control-label">Best Seller</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="specialoffer">
                                    <label for="specialoffer" class="custom-control-label">Special Offer</label>
                                </div>
                            </div>-->
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="pro_newarrival"
                                        name="pro_newarrival" value="1" @if ($product->pro_newarrival == 1) checked
                                    @endif>
                                    <label for="pro_newarrival" class="custom-control-label">New Arrival</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="pro_newproduct"
                                        name="pro_newproduct" value="1" @if ($product->pro_newproduct == 1) checked
                                    @endif>
                                    <label for="pro_newproduct" class="custom-control-label">New Product</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="pro_bestseller"
                                        name="pro_bestseller" value="1" @if ($product->pro_bestseller == 1) checked
                                    @endif>
                                    <label for="pro_bestseller" class="custom-control-label">Best Seller</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="pro_specialoffer"
                                        name="pro_specialoffer" value="1" @if ($product->pro_specialoffer == 1) checked
                                    @endif>
                                    <label for="pro_specialoffer" class="custom-control-label">Special Offer</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Labels</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="hotlabel">
                                    <label for="hotlabel" class="custom-control-label">Hot</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="newlabel">
                                    <label for="newlabel" class="custom-control-label">New</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="salelabel">
                                    <label for="salelabel" class="custom-control-label">Sale</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Tax</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Select Tax</label>
                                <select class="form-control">
                                    <option value="0">select</option>
                                    <option value="1">VAT</option>
                                    <option value="2">None</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Tags</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Tags</label>
                                <div class="select2-purple">
                                    <select class="select2" multiple="multiple" data-dropdown-css-class="select2-purple"
                                        style="width: 100%;">
                                        <option>IT</option>
                                        <option>Electronics</option>
                                        <option>Mobile</option>
                                        <option>Dress</option>
                                        <option>Grocerry</option>
                                        <option>Clothes</option>
                                        <option>Fresh</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary">Update Product</button>
                    </div>
                </div>
            </div>
        </form>
        @endcan

    </div>
</section>
@endsection

@section('extracss')
<style>
    .preview-images-zone {
        width: 100%;
        border: 1px solid #ddd;
        min-height: 180px;
        /* display: flex; */
        padding: 5px 5px 0px 5px;
        position: relative;
        overflow: auto;
    }

    .preview-images-zone>.preview-image:first-child {
        height: 185px;
        width: 185px;
        position: relative;
        margin-right: 5px;
    }

    .preview-images-zone>.preview-image {
        height: 90px;
        width: 90px;
        position: relative;
        margin-right: 5px;
        float: left;
        margin-bottom: 5px;
    }

    .preview-images-zone>.preview-image>.image-zone {
        width: 100%;
        height: 100%;
    }

    .preview-images-zone>.preview-image>.image-zone>img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .preview-images-zone>.preview-image>.tools-edit-image {
        position: absolute;
        z-index: 100;
        color: #fff;
        bottom: 0;
        width: 100%;
        text-align: center;
        margin-bottom: 10px;
        display: none;
    }

    .preview-images-zone>.preview-image>.image-cancel {
        font-size: 18px;
        position: absolute;
        top: 0;
        right: 0;
        font-weight: bold;
        margin-right: 10px;
        cursor: pointer;
        display: none;
        z-index: 100;
    }

    .preview-image:hover>.image-zone {
        cursor: move;
        opacity: .5;
    }

    .preview-image:hover>.tools-edit-image,
    .preview-image:hover>.image-cancel {
        display: block;
    }

    .ui-sortable-helper {
        width: 90px !important;
        height: 90px !important;
    }

    .container {
        padding-top: 50px;
    }
</style>
@endsection

@section('extrajs')

<!-- jQuery User Interface -->
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script>
    $(function () {
        // Summernote
        $('.summernote').summernote({
            height: 300,
        })
    })

</script>

<script>
    $(document).ready(function () {
        document.getElementById('pro_image').addEventListener('change', readImage, false);

        $(".preview-images-zone").sortable();

        $(document).on('click', '.image-cancel', function () {
            let no = $(this).data('no');
            $(".preview-image.preview-show-" + no).remove();
        });
    });



    var num = 4;

    function readImage() {
        if (window.File && window.FileList && window.FileReader) {
            var files = event.target.files; //FileList object
            var output = $(".preview-images-zone");

            for (let i = 0; i < files.length; i++) {
                var file = files[i];
                if (!file.type.match('image')) continue;

                var picReader = new FileReader();

                picReader.addEventListener('load', function (event) {
                    var picFile = event.target;
                    var html = '<div class="preview-image preview-show-' + num + '">' +
                        '<div class="image-cancel" data-no="' + num + '">x</div>' +
                        '<div class="image-zone">'+
                        '<img id="pro-img-' + num + '" src="' + picFile.result + '">'+
                        '</div>';

                    output.append(html);
                    num = num + 1;
                });

                picReader.readAsDataURL(file);
            }
            // $("#pro_image").val('');
        } else {
            console.log('Browser not support');
        }
    }

</script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    });

    
    $('#category_id').on('change', function(e) {
        if ($(this).val()) {
            $.get("/submission/getsubcatid/" + $(this).val(), function(data) {

                $element = $("#subcategory_id");
                $element.removeAttr('disabled');
                $element.find('option').remove().end().append("<option value=" + '' +
                    ">Choose Subcategory</option>");
                $(data).each(function() {
                    $element.append("<option value='" + this.id +
                        "'>" + this.subcat_name +
                        "</option>");
                });

            });
        }else{
            $element = $("#subcategory_id");
            $element.find('option').remove().end().append("<option value=" + '' +
                    ">Choose Subcategory</option>");
        }

    });

</script>
@endsection