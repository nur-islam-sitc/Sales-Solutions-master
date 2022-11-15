<?php

namespace App\Http\Controllers\API\V1\Client\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $product  = Product::all();
            return response()->json([
                'success' => true,
                'data' => $product,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' =>  $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {

            DB::beginTransaction();
            $product  = new Product();
            $product->category_id  = $request->category_id; 
            $product->user_id  = 1; 
            $product->shop_id  = 1;
            $product->product_name = $request->product_name; 
            $product->slug = Str::slug($request->product_name); 
            $product->price = $request->price; 
            $product->product_code = $request->product_code; 
            $product->product_qty = $request->product_qty; 
            $product->discount = $request->discount; 
            $product->size = $request->size; 
            $product->color = $request->color; 
            $product->short_description = $request->short_description; 
            $product->long_description = $request->long_description; 
            $product->meta_tag = $request->meta_tag; 
            $product->meta_description = $request->meta_description; 
            $product->status = $request->status; 
            $product->save();
            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'product created successfully',
                'data' => $product,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
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
    public function show($slug)
    {
        try {
            $product  = Product::where('slug',$slug)->first();
            if(!$product){
                return response()->json([
                    'success' => false,
                    'msg' =>  'Product not Found',
                ], 404);
            }
            return response()->json([
                'success' => true,
                'data' => $product,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' =>  $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        try {

            DB::beginTransaction();
            $product  = Product::find($id);
            if(!$product){
                return response()->json([
                    'success' => false,
                    'msg' =>  'Product not Found',
                ], 404);
            }
            $product->category_id  = $request->category_id; 
            $product->user_id  = 1; 
            $product->shop_id  = 1;
            $product->product_name = $request->product_name; 
            $product->slug = Str::slug($request->product_name); 
            $product->price = $request->price; 
            $product->product_code = $request->product_code; 
            $product->product_qty = $request->product_qty; 
            $product->discount = $request->discount; 
            $product->size = $request->size; 
            $product->color = $request->color; 
            $product->short_description = $request->short_description; 
            $product->long_description = $request->long_description; 
            $product->meta_tag = $request->meta_tag; 
            $product->meta_description = $request->meta_description; 
            $product->status = $request->status; 
            $product->save();
            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'product updated successfully',
                'data' => $product,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' =>  $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product  = Product::find($id);
            if(!$product){
                return response()->json([
                    'success' => false,
                    'msg' =>  'Product not Found',
                ], 404);
            }
            $product->delete();
            return response()->json([
                'success' => true,
                'msg' => 'product remove successfully',
                'data' => $product,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' =>  $e->getMessage(),
            ], 400);
        }
    }
}
