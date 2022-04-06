<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::with('subcategories')->where('cat_status', 1)->get();
        $category_id = [];
        $brand_id = [];
        if($request->input('category_id'))
        {
            $category_id = $request->input('category_id');
        }
        if($request->input('brand_id'))
        {
            $brand_id = $request->input('brand_id');
        }

        $products_query = Product::where('pro_status', 'published');
        $all_categories = Category::withCount('cat_products')->where('cat_status', 1)->get();
        $all_brands = Brand::withCount('brand_products')->where('brand_status', 1)->get();
        if($category_id)
        {
            $products_query->WhereIn('category_id', $category_id);
        }
        if($brand_id)
        {
            $products_query->orWhereIn('brand_id', $brand_id);
        }
        $all_products = $products_query->get();
        return view('frontend.shop.index', compact(['all_products', 'all_categories', 'all_brands', 'category_id', 'brand_id', 'categories']));
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
