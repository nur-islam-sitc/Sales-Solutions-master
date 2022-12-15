<?php

namespace App\Http\Controllers\API\V1\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function sendOrderToCourier(Request $request)
    {
        $data = Order::query()->find($request->input('order_id'));
        $courier = new Courier;
        return $courier->createOrder($data);
    }

    public function trackOrder(Request $request)
    {
        $courier = new Courier;

        if($request->filled('consignment_id')) {
            return $courier->trackOrder('/status_by_cid/'.$request->input('consignment_id'));
        }
        if($request->filled('invoice')) {
            return $courier->trackOrder('/status_by_invoice/'.$request->input('invoice'));
        }
        if($request->filled('tracking_code')) {
            return $courier->trackOrder('/status_by_trackingcode/'.$request->input('tracking_code'));
        }
    }
}
