<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:settings-list|settings-create|settings-edit|settings-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:settings-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:settings-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:settings-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::first();
        return view('admin.setting.index', compact('settings'));
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
        $setting_info = Setting::find(1);

        if ($request->file('logo')) {
            $logo_name = 'logo_'.time().'.'.pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
            Storage::disk('public')->delete($setting_info->logo);
            $logoName = Storage::disk('public')->putFileAs('logo', $request->file('logo'), $logo_name);
        }else{
            $logoName = $setting_info->logo;
        }
        
        Setting::where('id', 1)->update([
            'site_description' => $request->input('site_description'),
            'site_address' => $request->input('site_address'),
            'site_phone' => $request->input('site_phone'),
            'site_email' => $request->input('site_email'),
            'site_facebook' => $request->input('site_facebook'),
            'site_map' => $request->input('site_map'),
            'logo' => $logoName
        ]);

        return redirect()->route('settings.index')->with('success', 'Updated successfully');
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
