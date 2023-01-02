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
    public function show($slug): JsonResponse
    {
        $category = Category::with('category_image')->where('slug', $slug)->first();

        if(!$category) {
            return $this->sendApiResponse('', 'No data available');
        }
        return $this->sendApiResponse($category);
    }
}
