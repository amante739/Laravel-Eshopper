<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:banner-list|banner-create|banner-edit|banner-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:banner-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:banner-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:banner-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_banner = Banner::all();
        return view('admin.banner.index', compact('all_banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
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
            'banner_image'  => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->file('banner_image')) {
            $banner_img_name = 'banner_name_'.time().'.'.pathinfo($_FILES['banner_image']['name'], PATHINFO_EXTENSION);
            $bannerImage = Storage::disk('public')->putFileAs('banner', $request->file('banner_image'), $banner_img_name);

            Banner::create([
                'banner_title' => $request->input('banner_title'),
                'banner_link' => $request->input('banner_link'),
                'banner_status' => $request->input('banner_status'),
                'banner_image' => $bannerImage
            ]);

            return redirect()->route('banners.index')->with('success', 'Banner Insert successfully');
            
        }else{
            return redirect()->route('banners.index')->with('error', 'Something Went wrong ! Please select again');
        }
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
        $banner = Banner::find($id);
        return view('admin.banner.edit', compact('banner'));
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
        $bannerInfo = Banner::find($id);

        if ($request->file('banner_image')) {
            $banner_img_name = 'banner_name_'.time().'.'.pathinfo($_FILES['banner_image']['name'], PATHINFO_EXTENSION);
            Storage::disk('public')->delete($bannerInfo->banner_image);
            $bannerImage = Storage::disk('public')->putFileAs('banner', $request->file('banner_image'), $banner_img_name);
        
        }else{
            $bannerImage = $bannerInfo->banner_image;
        }
        $bannerInfo->update([
            'banner_title' => $request->input('banner_title'),
            'banner_link' => $request->input('banner_link'),
            'banner_status' => $request->input('banner_status'),
            'banner_image' => $bannerImage
        ]);

        return redirect()->route('banners.index')->with('success', 'Updated successfully');
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

    public function changeBannerStatus($id, $status)
    {
        if($status == 1 || $status == 0)
        {
            $bannerInfo = Banner::find($id);
            $bannerInfo->update([
                'banner_status' => $status
            ]);
            return redirect()->route('banners.index')->with('success', 'Status Updated Successfully');
        }
    }
}
