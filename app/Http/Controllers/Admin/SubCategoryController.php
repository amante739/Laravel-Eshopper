<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:subcategory-list|subcategory-create|subcategory-edit|subcategory-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:subcategory-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:subcategory-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:subcategory-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_sub_category = SubCategory::with('category')->paginate(15);
        return view('admin.subcategory.index', compact('all_sub_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create', compact(['categories']));
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
            'subcat_name' => 'required',
            'cat_id'  => 'required',
            'subcat_description' => 'nullable',
            'subcat_order'  => 'required',
            'subcat_is_featured'  => 'required',
            'subcat_status'  => 'required',
            'subcat_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->file('subcat_image')) {
            $subcat_img_name = 'subcat_name_'.time().'.'.pathinfo($_FILES['subcat_image']['name'], PATHINFO_EXTENSION);
            $subCatImage = Storage::disk('public')->putFileAs('subcategory', $request->file('subcat_image'), $subcat_img_name);
        }else{
            $get_img = Storage::disk('public')->path('demo.jpg');
            $subcat_img_name = 'subcat_name_'.time().'.'.pathinfo($get_img, PATHINFO_EXTENSION);
            $subCatImage = Storage::disk('public')->putFileAs('subcategory', $get_img, $subcat_img_name);
        }
        
        $custom_subcat_slug = preg_replace('/\s+/', '-', $request->input('subcat_name'));
        SubCategory::create([
            'subcat_name' => $request->input('subcat_name'),
            'subcat_slug' => strtolower($custom_subcat_slug),
            'cat_id' => $request->input('cat_id'),
            'subcat_description' => $request->input('subcat_description'),
            'subcat_order' => $request->input('subcat_order'),
            'subcat_is_featured' => $request->input('subcat_is_featured'),
            'subcat_status' => $request->input('subcat_status'),
            'subcat_image' => $subCatImage
        ]);

        return redirect()->route('subcategory.index')->with('success', 'Created successfully');
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
        $subcategory = SubCategory::with('category')->find($id);
        $categories = Category::all();
        return view('admin.subcategory.edit', compact(['categories', 'subcategory']));
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
            'subcat_name' => 'required',
            'cat_id'  => 'required',
            'subcat_description' => 'nullable',
            'subcat_order'  => 'required',
            'subcat_is_featured'  => 'required',
            'subcat_status'  => 'required',
            'subcat_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $subCatInfo = SubCategory::find($id);

        if ($request->file('subcat_image')) {
            $subcat_img_name = 'subcat_name_'.time().'.'.pathinfo($_FILES['subcat_image']['name'], PATHINFO_EXTENSION);
            Storage::disk('public')->delete($subCatInfo->subcat_image);
            $subCatImage = Storage::disk('public')->putFileAs('subcategory', $request->file('subcat_image'), $subcat_img_name);
        }else{
            if(empty($subCatInfo->subcat_image))
            {
                $get_img = Storage::disk('public')->path('demo.jpg');
                $subcat_img_name = 'subcat_name_'.time().'.'.pathinfo($get_img, PATHINFO_EXTENSION);
                $subCatImage = Storage::disk('public')->putFileAs('subcategory', $get_img, $subcat_img_name);
            }
            else{
                $subCatImage = $subCatInfo->subcat_image;
            }
        }
        
        $custom_subcat_slug = preg_replace('/\s+/', '-', $request->input('subcat_name'));
        $subCatInfo->update([
            'subcat_name' => $request->input('subcat_name'),
            'subcat_slug' => strtolower($custom_subcat_slug),
            'cat_id' => $request->input('cat_id'),
            'subcat_description' => $request->input('subcat_description'),
            'subcat_order' => $request->input('subcat_order'),
            'subcat_is_featured' => $request->input('subcat_is_featured'),
            'subcat_status' => $request->input('subcat_status'),
            'subcat_image' => $subCatImage
        ]);

        return redirect()->route('subcategory.index')->with('success', 'Updated successfully');
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

    public function changeSubCatStatus($id, $status)
    {
        if($status == 1 || $status == 0)
        {
            $subCatInfo = SubCategory::find($id);
            $subCatInfo->update([
                'subcat_status' => $status
            ]);
            return redirect()->route('subcategory.index')->with('success', 'Status Updated Successfully');
        }
    }
}
