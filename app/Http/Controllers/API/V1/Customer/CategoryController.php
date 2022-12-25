<?php

namespace App\Http\Controllers\API\V1\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        try {
            $shopId = $request->header('shop_id');
            $category  = Category::with('category_image')->where('shop_id',$shopId)->get();
            if(count($category) < 1){
                return response()->json([
                    'success' => false,
                    'msg' => 'Category not found',
                ], 400);
            }
            return response()->json([
                'success' => true,
                'data' => $category,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' =>  $e->getMessage(),
            ], 400);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
    }
}
