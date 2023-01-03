<?php

namespace App\Http\Controllers\API\V1\Client\Shop;

use App\Http\Controllers\MerchantBaseController;
use App\Models\Shop;
use App\Traits\sendApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ShopController extends MerchantBaseController
{
    use sendApiResponse;

    public function index(Request $request): JsonResponse
    {
        if($request->header('domain') && $request->header('domain') !== null) {
            $shop = Shop::query()->where('domain', $request->header('domain'))->first();
            if (!$shop) {
                throw ValidationException::withMessages([
                    'shop_id' => 'domain not found'
                ]);
            }

            $shop->load('shop_logo', 'merchant');

            return $this->sendApiResponse($shop);
        }

        return $this->sendApiResponse('', 'domain not found', 'DomainNotFound', [], 401);
    }
}
