<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:brand-list|brand-create|brand-edit|brand-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:brand-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:brand-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:brand-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_brand = Brand::all();
        return view('admin.brand.index', compact('all_brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
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
            'brand_name' => 'required|unique:brands,brand_name',
            'brand_description' => 'nullable',
            'brand_website' => 'nullable',
            'brand_order'  => 'required',
            'brand_is_featured'  => 'required',
            'brand_status'  => 'required',
            'brand_logo'  => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->file('brand_logo')) {
            $brand_img_name = 'brand_name_'.time().'.'.pathinfo($_FILES['brand_logo']['name'], PATHINFO_EXTENSION);
            $brandImage = Storage::disk('public')->putFileAs('brand', $request->file('brand_logo'), $brand_img_name);
        }else{
            $brandImage = '';
        }

        Brand::create([
            'brand_name' => $request->input('brand_name'),
            'brand_description' => $request->input('brand_description'),
            'brand_website' => $request->input('brand_website'),
            'brand_order' => $request->input('brand_order'),
            'brand_is_featured' => $request->input('brand_is_featured'),
            'brand_status' => $request->input('brand_status'),
            'brand_logo' => $brandImage
        ]);

        return redirect()->route('brand.index')->with('success', 'Updated successfully');
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
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
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
            'brand_name' => 'required|unique:brands,brand_name,' . $id,
            'brand_description' => 'nullable',
            'brand_website' => 'nullable',
            'brand_order'  => 'required',
            'brand_is_featured'  => 'required',
            'brand_status'  => 'required',
            'brand_logo'  => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $catInfo = Brand::find($id);

        if ($request->file('brand_logo')) {
            $brand_img_name = 'brand_name_'.time().'.'.pathinfo($_FILES['brand_logo']['name'], PATHINFO_EXTENSION);
            Storage::disk('public')->delete($catInfo->brand_logo);
            $brandImage = Storage::disk('public')->putFileAs('brand', $request->file('brand_logo'), $brand_img_name);
        }else{
            $brandImage = $catInfo->brand_logo;
        }
        
        $catInfo->update([
            'brand_name' => $request->input('brand_name'),
            'brand_description' => $request->input('brand_description'),
            'brand_website' => $request->input('brand_website'),
            'brand_order' => $request->input('brand_order'),
            'brand_is_featured' => $request->input('brand_is_featured'),
            'brand_status' => $request->input('brand_status'),
            'brand_logo' => $brandImage
        ]);

        return redirect()->route('brand.index')->with('success', 'Updated successfully');
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

    public function changeBrandStatus($id, $status)
    {
        if($status == 1 || $status == 0)
        {
            $brandtInfo = Brand::find($id);
            $brandtInfo->update([
                'brand_status' => $status
            ]);
            return redirect()->route('brand.index')->with('success', 'Status Updated Successfully');
        }
    }
}
