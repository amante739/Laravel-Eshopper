<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_category = Category::all();
        return view('admin.category.index', compact('all_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'cat_name' => 'required|unique:categories,cat_name',
            'cat_description' => 'nullable',
            'cat_order'  => 'required',
            'cat_is_featured'  => 'required',
            'cat_status'  => 'required',
            'cat_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->file('cat_image')) {
            $cat_img_name = 'cat_name_'.time().'.'.pathinfo($_FILES['cat_image']['name'], PATHINFO_EXTENSION);
            $catImage = Storage::disk('public')->putFileAs('category', $request->file('cat_image'), $cat_img_name);
        }else{
            $catImage = '';
        }

        $custom_cat_slug = preg_replace('/\s+/', '-', $request->input('cat_name'));
        Category::create([
            'cat_name' => $request->input('cat_name'),
            'cat_slug' => strtolower($custom_cat_slug),
            'cat_description' => $request->input('cat_description'),
            'cat_order' => $request->input('cat_order'),
            'cat_is_featured' => $request->input('cat_is_featured'),
            'cat_status' => $request->input('cat_status'),
            'cat_image' => $catImage
        ]);

        return redirect()->route('category.index')->with('success', 'Updated successfully');
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
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
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
            'cat_name' => 'required|unique:categories,cat_name,' . $id,
            'cat_description' => 'nullable',
            'cat_order'  => 'required',
            'cat_is_featured'  => 'required',
            'cat_status'  => 'required',
            'cat_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $catInfo = Category::find($id);

        if ($request->file('cat_image')) {
            $cat_img_name = 'cat_name_'.time().'.'.pathinfo($_FILES['cat_image']['name'], PATHINFO_EXTENSION);
            Storage::disk('public')->delete($catInfo->cat_image);
            $catImage = Storage::disk('public')->putFileAs('category', $request->file('cat_image'), $cat_img_name);
        }else{
            $catImage = $catInfo->cat_image;
        }
        
        $custom_slug = preg_replace('/\s+/', '-', $request->input('cat_name'));
        $catInfo->update([
            'cat_name' => $request->input('cat_name'),
            'cat_slug' => strtolower($custom_slug),
            'cat_description' => $request->input('cat_description'),
            'cat_order' => $request->input('cat_order'),
            'cat_is_featured' => $request->input('cat_is_featured'),
            'cat_status' => $request->input('cat_status'),
            'cat_image' => $catImage
        ]);

        return redirect()->route('category.index')->with('success', 'Updated successfully');
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

    public function changeCatStatus($id, $status)
    {
        if($status == 1 || $status == 0)
        {
            $catInfo = Category::find($id);
            $catInfo->update([
                'cat_status' => $status
            ]);
            return redirect()->route('category.index')->with('success', 'Status Updated Successfully');
        }
    }
}
