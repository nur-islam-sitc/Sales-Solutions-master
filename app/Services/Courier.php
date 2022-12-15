<?php

namespace App\Services;


use Illuminate\Support\Facades\Http;

class Courier
{
    public function request(): \Illuminate\Http\Client\PendingRequest
    {
        return Http::baseUrl('https://portal.steadfast.com.bd/api/v1/')
            ->withHeaders($this->credentials())
            ->asJson();
    }


    public function credentials(): array
    {
        return [
            'Api-Key' => config('services.courier.key'),
            'Secret-Key' => config('services.courier.secret'),
        ];
    }

    public function createOrder($data)
    {
        return $this->request()->post('create_order', [
            'invoice' => $data['order_no'],
            'recipient_name' => $data['customer_name'],
            'recipient_phone' => $data['customer_phone'],
            'recipient_address' => $data['customer_address'],
            'cod_amount' => $data['cod'],
            'note' => $data['note']
        ]);
    }

    public function trackOrder($url)
    {
        return $this->request()->get($url);
    }
}
