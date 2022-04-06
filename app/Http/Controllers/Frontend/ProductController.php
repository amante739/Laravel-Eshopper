<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('hello');
    }

    public function category_product($cat_slug)
    {
        $cat_data = Category::where('cat_slug', $cat_slug)->first();
        $all_prod = Product::with('brands')->where('category_id', $cat_data['id'])->get();
        return view('frontend.product.product_search', compact('all_prod'));
    }

    public function sub_category_product($cat_slug, $sub_cat_slug)
    {
        $cat_data = Category::where('cat_slug', $cat_slug)->first();
        $sub_cat_data = SubCategory::where('subcat_slug', $sub_cat_slug)->first();
        $all_prod = Product::with('brands')->where('category_id', $cat_data['id'])->where('subcategory_id', $sub_cat_data['id'])->get();
        return view('frontend.product.product_search', compact('all_prod'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pro_slug)
    {
        $product = Product::where('pro_slug', $pro_slug)->first();
        $product->pro_images = json_decode($product->pro_images, true);
        if(is_array($product->pro_images))
        {
            $images = $product->pro_images;
        }
        else
        {
            $images[] = $product->pro_images;
        }
        return view('frontend.product.index', compact(['product', 'images']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
