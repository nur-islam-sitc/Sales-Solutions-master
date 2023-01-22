<?php

namespace App\Http\Controllers\API\V1\Client\Stock\StockIn;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Media;
use App\Models\Product;
use App\Models\User;
use App\Traits\sendApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockInController extends Controller
{
    use sendApiResponse;

    public function index(Request $request)
    {
        $products   = Product::with('main_image', 'other_images')->where('shop_id',$request->header('shop-id'))->get();
        if($products->isEmpty()) {
            return $this->sendApiResponse('', 'No products available', 'NotAvailable');
        }
        return $this->sendApiResponse($products);
    }

    public function show(Request $request, $id)
    {

        $products   = Product::query()->with('main_image', 'other_images')
            ->where('shop_id',$request->header('shop-id'))
            ->where('id', $id)
            ->get();
        if($products->isEmpty()) {
            return $this->sendApiResponse('', 'Product Not found', 'NotAvailable');
        }
        return $this->sendApiResponse($products);

    }

    public function update(ProductRequest $request): JsonResponse
    {
        $product = Product::with('main_image', 'other_images')->where('id', $request->input('product_id'))
            ->where('shop_id', $request->header('shop-id'))
            ->first();
        if (!$product) {
            return $this->sendApiResponse('', 'Product Not found', 'NotFound');
        }

        if ($request->input('stock_quantity') != null) {
            $product->product_qty = ($product->product_qty + $request->input('stock_quantity'));
        }

        $product->save();
        return $this->sendApiResponse($product, 'Updated Successfully');
    }
}
