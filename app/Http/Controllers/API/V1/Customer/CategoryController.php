<?php

namespace App\Http\Controllers\API\V1\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\sendApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use sendApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $categories = Category::query()->with('category_image')->get();
        if($categories->isEmpty()) {
            return $this->sendApiResponse('', 'No data available',);
        }
        return $this->sendApiResponse($categories, 'No data available',);

    }


    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return JsonResponse
     */
    public function show(Request $request,$slug)
    {
        try {
            
            $shopId = $request->header('shop_id');
            $category = Category::with('category_image')->where('slug', $slug)->where('shop_id',$shopId)->first();
            if (!$category) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Category not Found',
                ], 404);
            }
            return response()->json([
                'success' => true,
                'data' =>   $category,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' =>   $e->getMessage(),
            ], 400);
        }
        return $this->sendApiResponse($category);
    }
}
