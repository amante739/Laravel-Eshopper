<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_data = User::where('id', Auth::user()->id)->first(['id', 'first_name', 'last_name', 'dob', 'username', 'phone', 'email', 'address_1', 'address_2', 'city', 'zip', 'avatar']);
        return view('frontend.user.index', compact(['user_data']));
    }

    public function user_sign_in(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect()
                ->back()
                ->with('success', 'Successfully Logged in.');
        } else {
            return redirect()->back()->with('login_error', 'Wrong Email or Password !');
        }
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
        $validator = Validator::make(request()->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'address_1' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'phone' => 'required'
        ]);
        if ($validator->fails()) {
            // return redirect()->back()->withErrors($validator)->withInput();
            return redirect()->back()->with('error', 'Please Fillup all Input fields !');
        }
        
        $user = User::find($id);
        
        if ($request->file('avatar')) {
            $avatar_img_name = 'brand_name_'.time().'.'.pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
            Storage::disk('public')->delete($user->avatar);
            $avatarImage = Storage::disk('public')->putFileAs('user', $request->file('avatar'), $avatar_img_name);
        }else{
            $avatarImage = $user->avatar;
        }

        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'username' => $request->input('username'),
            'dob' => $request->input('dob'),
            'address_1' => $request->input('address_1'),
            'address_2' => $request->input('address_2'),
            'city' => $request->input('city'),
            'zip' => $request->input('zip'),
            'phone' => $request->input('phone'),
            'avatar' => $avatarImage,
        ]);
        return redirect()->route('account.index')->with('success', 'Updated successfully');
    }

    public function changePassword()
    {
        $user_data = User::where('id', Auth::user()->id)->first(['id', 'avatar']);
        return view('frontend.user.change_pass', compact(['user_data']));
    }

    public function updatePassword(Request $request, $id)
    {
        $validator = Validator::make(request()->all(), [
            'password' => 'required|same:password_confirm|min:5'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user_data = User::find($id);
        $user_data->password = Hash::make($request->input('password'));
        $user_data->save(); 

        return redirect()->back()->with('success', 'Information Updated Successfully');
    }
    public function getMyOrderList()
    {
        $user_data = User::where('id', Auth::user()->id)->first(['avatar']);
        $order_list = Order::where('user_id', Auth::user()->id)->get();
        return view('frontend.user.order_list', compact(['order_list', 'user_data']));
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
