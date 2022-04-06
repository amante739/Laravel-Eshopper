<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_data = '';
        $cart_data = [];
        if(session('cart'))
        {
            $cart_data = session('cart');
        }


        if(!empty($cart_data))
        {
            return view('frontend.checkout.index', compact('cart_data'));
        }
        else
        {
            return redirect('/')->with('error', 'Cart is empty !');
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
        $validator = Validator::make(request()->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'address_1' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'phone' => 'required',
            'email' => 'required|email'
        ]);
        if ($validator->fails()) {
            // return redirect()->back()->withErrors($validator)->withInput();
            return redirect()->back()->with('error', 'Please Input all Required fields !');
        }
        $id = $request->input('id');
        $pro_name = $request->input('pro_name');
        $pro_url = $request->input('pro_url');
        $pro_main_image = $request->input('pro_main_image');
        $pro_quantity = $request->input('pro_quantity');
        $pro_sale_price = $request->input('pro_sale_price');
        $password = $request->input('password');
        $check_pass = $request->input('check_pass');
        // dd($request->input('check_pass'));
        if($check_pass == 1)
        {

            if($password)
            {
                $email_count = User::where('email', $request->input('email'))->count();
                if($email_count >= 1)
                {
                    return redirect()->back()->with('error', 'Email already exists ! Use Different Email.');
                }
                else
                {
                    $user_data = User::create([
                        "first_name" => $request->input('first_name'),
                        "last_name" => $request->input('last_name'),
                        "address_1" => $request->input('address_1'),
                        "address_2" => $request->input('address_2'),
                        "city" => $request->input('city'),
                        "zip" => $request->input('zip'),
                        "phone" => $request->input('phone'),
                        "email" => $request->input('email'),
                        "password" => Hash::make($password)
                    ]);
                    auth()->login($user_data);
                }
                
            }else{
                return redirect()->back()->with('error', 'Please Input Password and try again !');
            }
        }
        if(isset($user_data))
        {
            $user_id = $user_data->id;
        }
        else
        {
            $user_id = 0;
        }
        
        $order_detail = [];
        foreach($id as $key => $row)
        {
            $order_detail[] = [
                "product_id" => $row,
                "product_name" => $pro_name[$key],
                "product_quantity" => $pro_quantity[$key],
                "product_price" => $pro_sale_price[$key],
                "product_image" => $pro_main_image[$key],
                "product_url" => $pro_url
            ];
        }

        $order = Order::create([
            "user_id" => $user_id,
            "first_name" => $request->input('first_name'),
            "last_name" => $request->input('last_name'),
            "address_1" => $request->input('address_1'),
            "address_2" => $request->input('address_2'),
            "city" => $request->input('city'),
            "zip" => $request->input('zip'),
            "phone" => $request->input('phone'),
            "email" => $request->input('email'),
            "order_amount" => $request->input('total_price'),
            "order_description" => json_encode($order_detail),
            "sub_total" => $request->input('total_price'),
        ]);
        session()->forget('cart');
        
        return redirect('/')->with('success', 'Your order is placed. We wll contact you soon. Thank you.');
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
