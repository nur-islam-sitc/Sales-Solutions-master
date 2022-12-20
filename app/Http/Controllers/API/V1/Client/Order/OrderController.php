<?php

namespace App\Http\Controllers\API\V1\Client\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $orders  = Order::with('order_details')->get();
            return response()->json([
                'success' => true,
                'data' => $orders,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' =>  $e->getMessage(),
            ], 400);
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
    public function store(OrderRequest $request)
    {
        //return $request->all();
        try {
            DB::beginTransaction();
            $user = new User();
            $user->name = $request->customer_name;
            $user->email = 'guest'.rand(1000,9999).'@gmail.com';
            $user->phone  = $request->customer_phone;
            $user->address  = $request->customer_address;
            $user->password = Hash::make(12345678);
            $user->save();
            $order = new Order();
            $order->order_no = rand(100,9999);
            $order->shop_id = $request->shop_id;
            $order->user_id = $user->id;
            $order->save();

            //store order details
            foreach($request->product_id as $key => $val){

                $orderDetails = new OrderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $val;
                $orderDetails->product_qty = $request->product_qty[$key];
                $orderDetails->save();
            }
            $createdOrder = Order::with('order_details')->where('id',$order->id)->first();

            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'Order created Successfully',
                'data' =>   $createdOrder,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' =>   $e->getMessage(),
            ], 400);
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
        try {
            $order = Order::with('order_details')->where('id', $id)->first();
            if (!$order) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Category not Found',
                ], 404);
            }
            return response()->json([
                'success' => true,
                'data' =>   $order,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' =>   $e->getMessage(),
            ], 400);
        }
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


    public function order_status_update(OrderRequest $request)
    {
        try {

            $order = Order::with('order_details')->where('id', $request->order_id)->first();
            if (!$order) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Order not Found!',
                ], 404);
            }

            $order->order_status = $request->status;
            $order->save();

            return response()->json([
                'success' => true,
                'msg' =>   'Order Status Update Successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' =>   $e->getMessage(),
            ], 400);
        }
    }
}