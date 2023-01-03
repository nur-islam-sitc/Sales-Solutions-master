<?php

namespace App\Http\Controllers\API\V1\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    public function store(OrderRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $user = new User();
            $user->name = $request->input('customer_name');
            $user->role = 'customer';
            $user->email = 'guest' . rand(1000, 9999) . '@gmail.com';
            $user->phone = $request->input('customer_phone');
            $user->address = $request->input('customer_address');
            $user->password = Hash::make(12345678);
            $user->save();
            $order = new Order();
            $order->order_no = rand(100, 9999);
            $order->shop_id = $request->header('shop_id');
            $order->user_id = $user->id;

            $order->save();

            //store order details
            foreach ($request->input('product_id') as $key => $val) {

                $orderDetails = new OrderDetails();
                $orderDetails->order_id = $order->id;
                $orderDetails->product_id = $val;
                $orderDetails->product_qty = $request->product_qty[$key];
                $orderDetails->save();
            }
            $createdOrder = Order::with('order_details')->where('id', $order->id)->first();

            foreach ($createdOrder->order_details as $details) {
                $details->product->update([
                    'product_qty' => $details->product->product_qty - $details->product_qty
                ]);
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'Order created Successfully',
                'data' => $createdOrder,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' => $e->getMessage(),
            ], 400);
        }
    }
}
