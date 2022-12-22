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

            $merchant = User::where('role', 'merchant')->find(auth()->user()->id);
            if (!$merchant) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Merchant not Found',
                ], 404);
            }

            $allOrder = [];
            $orders  = Order::with('order_details')->where('shop_id',$merchant->shop->id)->get();
            if (!$orders) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Customer not Found',
                ], 404);
            }
            foreach($orders as $order){
                $customer = User::where('id', $order->user_id)->where('role','customer')->first();
                if (!$customer) {
                    return response()->json([
                        'success' => false,
                        'msg' =>  'Customer not Found',
                    ], 404);
                }

                $allOrder[] = [
                    'order' => $order,
                    'customer' => $customer,
                ];
                
            }

            return response()->json([
                'success' => true,
                'data' => $allOrder,
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
            $user->role = 'customer';
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

            foreach($createdOrder->order_details as $details){
                $details->product->update([
                    'product_qty'=> $details->product->product_qty - $details->product_qty
                ]);
            }

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
            $merchant = User::where('role', 'merchant')->find(auth()->user()->id);
            if (!$merchant) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Merchant not Found',
                ], 404);
            }

            $order = Order::with(['order_details'])->where('id', $id)->where('shop_id',$merchant->shop->id)->first();
            if (!$order) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Order not Found',
                ], 404);
            }

            $customer = User::where('id', $order->user_id)->where('role','customer')->first();
            if (!$customer) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Customer not Found',
                ], 404);
            }

            $order['customer']= $customer;

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

            $merchant = User::where('role', 'merchant')->find(auth()->user()->id);
            if (!$merchant) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Merchant not Found',
                ], 404);
            }

            $order = Order::with('order_details')->where('id', $request->order_id)->where('shop_id',$merchant->shop->id)->first();
            if (!$order) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Order not Found!',
                ], 404);
            }

            $order->order_status = $request->status;
            if($request->status == 'returned'){
                $order->return_order_date = $request->return_order_date;
                $order->return_order_note = $request->return_order_note;
                foreach($order->order_details as $details){
                    $details->product->update([
                        'product_qty' => $details->product->product_qty + $details->product_qty
                    ]);
                }
            }
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
