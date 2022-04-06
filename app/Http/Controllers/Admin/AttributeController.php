<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttributeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:attribute-list|attribute-create|attribute-edit|attribute-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:attribute-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:attribute-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:attribute-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_attribute = Attribute::all();
        return view('admin.attribute.index', compact('all_attribute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attribute.create');
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
            'attribute_name' => 'required|unique:attributes,attribute_name,',
            'attribute_slug' => 'nullable',
            'attribute_order' => 'required',
            'attribute_display_layout'  => 'required',
            'attribute_status'  => 'required',
            'attribute_set_name.*' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $attribute_set_name = $request->input('attribute_set_name');
        $attribute_set_slug = $request->input('attribute_set_slug');
        $attribute_set_color = $request->input('attribute_set_color');
        $attribute_set_is_default = $request->input('attribute_set_is_default');
        // $attribute_set_status = $request->input('attribute_set_status');

        if($attribute_set_is_default)
        {
            $attribute_set_is_default_number = $attribute_set_is_default[0];
        }else{
            $attribute_set_is_default_number = 0;
        }
        
        $attrInfo = Attribute::create([
            'attribute_name' => $request->input('attribute_name'),
            'attribute_slug' => $request->input('attribute_slug'),
            'attribute_order' => $request->input('attribute_order'),
            'attribute_display_layout' => $request->input('attribute_display_layout'),
            'attribute_status' => $request->input('attribute_status')
        ]);

        for($i=0; $i<count($attribute_set_name);$i++)
        {
            $attrSetInfo = new AttributeSet();
            $attrSetInfo->attribute_id = $attrInfo->id;
            $attrSetInfo->attribute_set_name = $attribute_set_name[$i];
            $attrSetInfo->attribute_set_slug = $attribute_set_slug[$i];
            $attrSetInfo->attribute_set_color = $attribute_set_color[$i];
            $attrSetInfo->attribute_set_is_default = (($attribute_set_is_default_number-1) == $i) ? '1' : '0';
            $attrSetInfo->attribute_set_status = 1;
            $attrSetInfo->save();
        }

        return redirect()->route('attribute.index')->with('success', 'Stored successfully');
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
        $attribute = Attribute::with('attributesets')->find($id);
        $rgb = [];
        foreach($attribute->attributesets as $key => $row){
            if($row->attribute_set_color){
                $color_output = ltrim($row->attribute_set_color, '#');
                list($iRed, $iGreen, $iBlue) = array_map('hexdec', str_split($color_output, 2));
                $attribute->attributesets[$key]->rgb = 'style = color:rgb('.$iRed . ',' . $iGreen . ',' . $iBlue.')';
            }
            else{
                $attribute->attributesets[$key]->rgb = 'rgb(255, 255, 255)';
            }
        }
        return view('admin.attribute.edit', compact('attribute'));
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
            'attribute_name' => 'required|unique:attributes,attribute_name,' . $id,
            'attribute_slug' => 'nullable',
            'attribute_order' => 'required',
            'attribute_display_layout'  => 'required',
            'attribute_status'  => 'required',
            'attribute_set_name.*' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $attrInfo = Attribute::find($id);

        $attribute_set_name = $request->input('attribute_set_name');
        $attribute_set_slug = $request->input('attribute_set_slug');
        $attribute_set_color = $request->input('attribute_set_color');
        $attribute_set_is_default = $request->input('attribute_set_is_default');
        // $attribute_set_status = $request->input('attribute_set_status');

        if($attribute_set_is_default)
        {
            $attribute_set_is_default_number = $attribute_set_is_default[0];
        }else{
            $attribute_set_is_default_number = 0;
        }

        AttributeSet::where('attribute_id', $id)->delete();

        for($i=0; $i<count($attribute_set_name);$i++)
        {
            $attrSetInfo = new AttributeSet();
            $attrSetInfo->attribute_id = $id;
            $attrSetInfo->attribute_set_name = $attribute_set_name[$i];
            $attrSetInfo->attribute_set_slug = $attribute_set_slug[$i];
            $attrSetInfo->attribute_set_color = $attribute_set_color[$i];
            $attrSetInfo->attribute_set_is_default = (($attribute_set_is_default_number-1) == $i) ? '1' : '0';
            $attrSetInfo->attribute_set_status = 1;
            $attrSetInfo->save();
        }
        $attrInfo->update([
            'attribute_name' => $request->input('attribute_name'),
            'attribute_slug' => $request->input('attribute_slug'),
            'attribute_order' => $request->input('attribute_order'),
            'attribute_display_layout' => $request->input('attribute_display_layout'),
            'attribute_status' => $request->input('attribute_status')
        ]);

        return redirect()->route('attribute.index')->with('success', 'Updated successfully');
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

    public function changeAttributeStatus($id, $status)
    {
        if($status == 1 || $status == 0)
        {
            $attrInfo = Attribute::find($id);
            $attrInfo->update([
                'attribute_status' => $status
            ]);
            return redirect()->route('attribute.index')->with('success', 'Status Updated Successfully');
        }
    }
}
