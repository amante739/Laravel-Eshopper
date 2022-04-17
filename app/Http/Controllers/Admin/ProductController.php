<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Image;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_product = Product::all();
        return view('admin.product.index', compact('all_product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_brand = Brand::all();
        $all_category = Category::all();
        $all_attribute = Attribute::with('attributesets')->get();
        return view('admin.product.create', compact(['all_category', 'all_attribute', 'all_brand']));
    }

    /**
     * Retrive subcategory list.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getSubCategoryList(Request $request, $id)
    {
        if ($request->ajax()) {
            $subcategory = SubCategory::where('cat_id', $id)->get();
            return $subcategory;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make(request()->all(), [
            'pro_name' => 'required|unique:products,pro_name',
            'pro_description' => 'nullable',
            'pro_content' => 'nullable',
            'pro_images.*' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
            'pro_status'  => 'required',
            'pro_buy_price'  => 'required|numeric|min:1',
            'pro_sale_price'  => 'required|numeric|min:1',
            'pro_discount'  => 'required|numeric|min:0',
            'pro_is_featured'  => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required' //,
            /*'pro_newarrival'=> 'required',
            'pro_newproduct'=> 'required',
            'pro_bestseller'=> 'required',
            'pro_specialoffer'=> 'required'*/
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $attr_count = Attribute::count();
        $attrlist = [];
        for ($i = 0; $i <= $attr_count; $i++) {
            if ($request->input('attribute' . $i)) {
                $attrlist[] = array(
                    'key' => $request->input('attribute' . $i),
                    'value' => $request->input('subattribute' . $i)
                );
            }
        }

        $proAllImage = [];
        $pro_main_image = 'storage/demo.jpg';
        if ($request->file('pro_images')) {
            foreach ($_FILES['pro_images']['name'] as $key => $val) {
                $pro_img_name = 'product_' . $key . '_' . time() . '.' . pathinfo($val, PATHINFO_EXTENSION);
                $file = Image::make($request->file('pro_images')[$key])->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                Storage::disk('public')->put('product/' . $pro_img_name, $file->stream());
                if ($key == 0) {
                    $pro_main_image = 'product/' . $pro_img_name;
                }
                array_push($proAllImage, 'product/' . $pro_img_name);
            }
        } else {
            $static_image = Storage::disk('public')->path('demo.jpg');
            $pro_img_name = 'product_0_' . time() . '.' . pathinfo($static_image, PATHINFO_EXTENSION);
            $proAllImage = Storage::disk('public')->putFileAs('product', $static_image, $pro_img_name);
        }
        // dd($request->input('pro_newarrival'). $request->input('pro_newproduct'));
        //dd(($request->has('pro_newarrival')) ? true : false);

        $custom_pro_slug = preg_replace('/\s+/', '-', $request->input('pro_name'));
        $Sku= (int)Product::max('id') + 1;
        Product::create([
            'pro_name' => $request->input('pro_name'),
            'pro_slug' => strtolower($custom_pro_slug),
            'pro_description' => $request->input('pro_description'),
            'pro_content' => $request->input('pro_content'),
            'pro_images' => json_encode($proAllImage),
            'pro_main_image' => $pro_main_image,
            'pro_sku' => 'PR-00'. $Sku,
            'pro_order' => 0,
            'pro_quantity' => $request->input('pro_quantity'),
            'pro_allow_checkout_when_out_of_stock' => 0,
            'pro_with_storehouse_management' => 0,
            'pro_is_featured' => $request->input('pro_is_featured'),
            'pro_newarrival' => ($request->has('pro_newarrival')) ? 1 : 0,
            //$request->input('pro_newarrival'),
            'pro_newproduct' => ($request->has('pro_newproduct')) ? 1 : 0,
            'pro_bestseller' => ($request->has('pro_bestseller')) ? 1 : 0,
            'pro_specialoffer' => ($request->has('pro_specialoffer')) ? 1 : 0, // $request->input('pro_specialoffer'),
            'pro_options' => Null,
            'category_id' => $request->input('category_id'),
            'subcategory_id' => $request->input('category_id'),
            'brand_id' => $request->input('brand_id'),
            'pro_is_variation' => 0,
            'pro_variations' => json_encode($attrlist),
            'pro_is_searchable' => 0,
            'pro_is_show_on_list' => 0,
            'pro_sale_type' => 0,
            'pro_buy_price' => $request->input('pro_buy_price'),
            'pro_sale_price' => $request->input('pro_sale_price'),
            'pro_discount' => $request->input('pro_discount'),
            'pro_start_date' => '2022-01-01 03:03:23',
            'pro_end_date' => '2025-12-31 03:03:23',
            'pro_length' => 0,
            'pro_wide' => 0,
            'pro_height' => 0,
            'pro_weight' => 0,
            'pro_barcode' => null,
            'pro_length_unit' => null,
            'pro_wide_unit' => null,
            'pro_height_unit' => null,
            'pro_weight_unit' => null,
            'pro_views' => 0,
            'pro_added_by' => Auth::user()->id,
            'pro_stock_status' => 'in_stock',
            'pro_status' => $request->input('pro_status'),   // published, draft, pending
        ]);

        return redirect()->route('product.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();

        $product->pro_images = json_decode($product->pro_images);
        if (is_array($product->pro_images)) {
            $images = $product->pro_images;
        } else {
            $images[] = $product->pro_images;
        }
        $product_variations = json_decode($product->pro_variations, true);
        // dd($product_variations);
        $all_brand = Brand::all();
        $all_category = Category::all();
        $all_subcategory = SubCategory::where('cat_id', $product->category_id)->get();
        $all_attribute = Attribute::with('attributesets')->get();

        return view('admin.product.edit', compact(['product', 'all_category', 'all_subcategory', 'all_brand', 'all_attribute', 'images', 'product_variations']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'pro_name' => 'required|unique:products,pro_name,' . $id,
            'pro_description' => 'nullable',
            'pro_content' => 'nullable',
            // 'pro_images.*' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
            'pro_status'  => 'required',
            'pro_buy_price'  => 'required|numeric|min:1',
            'pro_sale_price'  => 'required|numeric|min:1',
            'pro_discount'  => 'required|numeric|min:0',
            'pro_is_featured'  => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $attr_count = Attribute::count();
        $attrlist = [];
        for ($i = 0; $i <= $attr_count; $i++) {
            if ($request->input('attribute' . $i)) {
                $attrlist[] = array(
                    'key' => $request->input('attribute' . $i),
                    'value' => $request->input('subattribute' . $i)
                );
            }
        }

        $proAllImage = [];
        $pro_main_image = '';
        $count = 0;
        if ($request->input('pro_old_images')) {
            foreach ($request->input('pro_old_images') as $key_old => $val) {
                $img_name = str_replace("product/", "", $val);
                $img_new_name = 'product_' . $key_old . '_' . time() . '.' . pathinfo($img_name, PATHINFO_EXTENSION);

                if (($key_old) == 0) {
                    $pro_main_image = 'product/' . $img_new_name;
                }

                array_push($proAllImage, 'product/' . $img_new_name);
                Storage::disk('public')->copy($val, 'product/' . $img_new_name);
            }
            $count = $key_old + 1;
        }

        $productInfo = Product::find($id);

        $old_images = json_decode($productInfo->pro_images);
        if (($old_images)) {
            foreach ($old_images as $val) {
                Storage::disk('public')->delete($val);
            }
        }

        $productInfo->pro_images = json_decode($productInfo->pro_images);

        if ($request->file('pro_images')) {
            foreach ($_FILES['pro_images']['name'] as $key => $val) {
                $pro_img_name = 'product_' . ($key + $count) . '_' . time() . '.' . pathinfo($val, PATHINFO_EXTENSION);
                $file = Image::make($request->file('pro_images')[$key])->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                Storage::disk('public')->put('product/' . $pro_img_name, $file->stream());
                if (($key + $count) == 0) {
                    $pro_main_image = 'product/' . $pro_img_name;
                }
                array_push($proAllImage, 'product/' . $pro_img_name);
            }
        }

        $custom_pro_slug = preg_replace('/\s+/', '-', $request->input('pro_name'));
        $productInfo->update([
            'pro_name' => $request->input('pro_name'),
            'pro_slug' => strtolower($custom_pro_slug),
            'pro_description' => $request->input('pro_description'),
            'pro_content' => $request->input('pro_content'),
            'pro_images' => json_encode($proAllImage),
            'pro_main_image' => $pro_main_image,
            'pro_sku' => 'PR-25',
            'pro_order' => 0,
            'pro_quantity' => 0,
            'pro_allow_checkout_when_out_of_stock' => 0,
            'pro_with_storehouse_management' => 0,
            'pro_is_featured' => $request->input('pro_is_featured'),
            'pro_newarrival' => ($request->has('pro_newarrival')) ? 1 : 0,
            //$request->input('pro_newarrival'),
            'pro_newproduct' => ($request->has('pro_newproduct')) ? 1 : 0,
            'pro_bestseller' => ($request->has('pro_bestseller')) ? 1 : 0,
            'pro_specialoffer' => ($request->has('pro_specialoffer')) ? 1 : 0,
            'pro_options' => Null,
            'category_id' => $request->input('category_id'),
            'subcategory_id' => $request->input('subcategory_id'),
            'brand_id' => $request->input('brand_id'),
            'pro_is_variation' => 0,
            'pro_variations' => json_encode($attrlist),
            'pro_is_searchable' => 0,
            'pro_is_show_on_list' => 0,
            'pro_sale_type' => 0,
            'pro_buy_price' => $request->input('pro_buy_price'),
            'pro_sale_price' => $request->input('pro_sale_price'),
            'pro_discount' => $request->input('pro_discount'),
            'pro_start_date' => '2022-01-01 03:03:23',
            'pro_end_date' => '2025-12-31 03:03:23',
            'pro_length' => 0,
            'pro_wide' => 0,
            'pro_height' => 0,
            'pro_weight' => 0,
            'pro_barcode' => null,
            'pro_length_unit' => null,
            'pro_wide_unit' => null,
            'pro_height_unit' => null,
            'pro_weight_unit' => null,
            'pro_views' => 0,
            'pro_stock_status' => 'in_stock',
            'pro_status' => $request->input('pro_status'),   // published, draft, pending
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
