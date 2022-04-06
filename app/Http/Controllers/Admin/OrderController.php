<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:order-list|order-create|order-edit|order-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:order-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:order-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:order-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_order = Order::all();
        return view('admin.order.index', compact(['all_order']));
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
        $order = Order::where('id', $id)->first();
        $order_view = json_decode($order->order_description, true);
        // foreach($order_view as $row)
        // {
        //     echo "<pre>";
        //     print_r($row['product_id'].' '.$row['product_name'].' '.$row['product_quantity'].' '.$row['product_price']);
        // }
        return view('admin.order.edit', compact(['order', 'order_view']));
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

    public function changeOrderConfirmStatus($id, $status)
    {
        if($status == 1 || $status == 0)
        {
            $ordertConfirmInfo = Order::find($id);
            $ordertConfirmInfo->update([
                'order_is_confirmed' => $status,
                'order_confirmed_by' => Auth::user()->id
            ]);
            return redirect()->back()->with('success', 'Order Confirmed Successfully');
        }
    }

    public function changeOrderStatus($id, $status)
    {
        if($status == 1 || $status == 0)
        {
            $ordertInfo = Order::find($id);
            $ordertInfo->update([
                'order_is_finished' => $status,
                'order_finished_by' => Auth::user()->id
            ]);
            return redirect()->back()->with('success', 'Order Completed Successfully');
        }
    }
}
