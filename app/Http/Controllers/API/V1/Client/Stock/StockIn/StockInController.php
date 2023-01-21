<?php

namespace App\Http\Controllers\API\V1\Client\Stock\StockIn;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Media;
use App\Models\Product;
use App\Models\User;
use App\Traits\sendApiResponse;
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

    public function update(ProductRequest $request)
    {
        //return $request->all();
        try {

            $merchant = User::query()->where('role', 'merchant')->find(auth()->user()->id);
            if (!$merchant) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Merchant not Found',
                ], 404);
            }

            DB::beginTransaction();
            $oldData = NULL;
            $product  = Product::with('main_image')->where('id', $request->product_id)->where('shop_id',$merchant->shop->id)->first();
            if (!$product) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Product not Found',
                ], 404);
            }


            $oldData = $product;


            if ($request->stock_quantity != null) {
                $product->product_qty = ($product->product_qty + $request->stock_quantity);
            }

            $product->save();

            $updatedProduct = Product::with(['main_image'])->where('id', $request->product_id)->first();
            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'Stock In successfully',
                'data' => $updatedProduct,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' =>  $e->getMessage(),
            ], 400);
        }
    }
}
