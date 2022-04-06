<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart_data = [];
        if(session('cart'))
        {
            $cart_data = session('cart');
        }
        if(!empty($cart_data))
        {
            return view('frontend.cart.index', compact('cart_data'));
        }
        else
        {
            return redirect('/');
        }
    }

    
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['pro_quantity']++;
        } else {
            $cart[$id] = [
                "pro_name" => $product->pro_name,
                "pro_quantity" => 1,
                "pro_sale_price" => $product->pro_sale_price,
                "pro_main_image" => $product->pro_main_image,
                "pro_url" => url('product-details/'.$product->pro_slug)
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function product_cart(Request $request)
    {
        $id = $request->input('id');
        $pro_quantity = $request->input('pro_quantity');
        if($pro_quantity >=1)
        {
            $product = Product::findOrFail($id);
            $cart = session()->get('cart', []);
    
            if(isset($cart[$id])) {
                $cart[$id]['pro_quantity'] += $pro_quantity;
            } else {
                $cart[$id] = [
                    "pro_name" => $product->pro_name,
                    "pro_quantity" => $pro_quantity,
                    "pro_sale_price" => $product->pro_sale_price,
                    "pro_main_image" => $product->pro_main_image,
                    "pro_url" => url('product-details/'.$product->pro_slug)
                ];
            }
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        else{
            return redirect()->back()->with('quantity_error', 'Quantity must be minimum 1 !');
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
    public function update(Request $request)
    {
        $pro_id = $request->input('pro_id');
        $pro_quantity = $request->input('pro_quantity');

        
        $cart = session()->get('cart');
        foreach($pro_id as $key=>$id)
        {
            if($pro_quantity[$key])
            {
                $cart[$id]["pro_quantity"] = $pro_quantity[$key];
                session()->put('cart', $cart);
            }
            else
            {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }
        return redirect()->back()->with('success', 'Cart updated successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
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
