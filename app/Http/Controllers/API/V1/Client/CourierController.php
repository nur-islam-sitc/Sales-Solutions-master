<?php

namespace App\Http\Controllers\API\V1\Client;

use App\Http\Controllers\Controller;
use App\Models\MerchantCourier;
use App\Models\Order;
use App\Services\Courier;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CourierController extends Controller
{
    public function store(Request $request): JsonResponse
    {

        if ($request->filled('merchant_id')) {

            $courier = MerchantCourier::query()
                ->where('merchant_id', $request->input('merchant_id'))
                ->where('provider', $request->input('provider'))->first();

            if (!$courier) {
                $courier = MerchantCourier::query()->create([
                    'merchant_id' => $request->input('merchant_id'),
                    'provider' => $request->input('provider'),
                    'status' => $request->input('status'),
                    'config' => $request->input('config'),
                ]);
            } else {
                $courier->update([
                    'status' => $request->input('status'),
                    'config' => $request->input('config'),
                ]);
            }

            return response()->json($courier);
        }

        return response()->json(['error' => 'Merchant is required in order to get courier']);

    }

    public function sendOrderToCourier(Request $request)
    {
        if ($request->filled('merchant_id') && $request->filled('provider')) {
            $courier = MerchantCourier::query()
                ->where('merchant_id', $request->input('merchant_id'))
                ->where('provider', $request->input('provider'))
                ->first();

            if(!$courier) {

//                throw ValidationException::withMessages([
//                    'provider' => 'Invalid provider or merchant',
//                ]);
            }
            $data['order_no'] = 1;
            $data['customer_name'] = '1';
            $data['customer_phone'] = '01955945052';
            $data['customer_address'] = '1';
            $data['cod'] = 1;
            $data['note'] = '1';
            $credentials = collect(json_decode($courier->config))->toArray();

            $provider = new Courier();
            $response = $provider->createOrder($credentials, $data);

            if($response['status'] == 200) {
                dd('s');
            }

        }
        $data = Order::query()->find($request->input('order_id'));
        $courier = new Courier;
        return $courier->createOrder($data);
    }

    public function trackOrder(Request $request)
    {
        $courier = new Courier;

        if ($request->filled('consignment_id')) {
            return $courier->trackOrder('/status_by_cid/' . $request->input('consignment_id'));
        }
        if ($request->filled('invoice')) {
            return $courier->trackOrder('/status_by_invoice/' . $request->input('invoice'));
        }
        if ($request->filled('tracking_code')) {
            return $courier->trackOrder('/status_by_trackingcode/' . $request->input('tracking_code'));
        }
    }
}
