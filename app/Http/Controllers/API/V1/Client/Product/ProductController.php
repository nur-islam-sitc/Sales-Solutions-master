<?php

namespace App\Http\Controllers\API\V1\Client\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Media;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use File;

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
            $allProduct = [];
            $products   = Product::with('main_image')->get();
            foreach($products as $product){
                $other_images = Media::where('parent_id',$product->id)->where('type', 'product_other_image')->get();
                $product['other_images']= $other_images;
                $allProduct[] = $product;
            }
            return response()->json([
                'success' => true,
                'data' => $allProduct,
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
        //return $request->all();
        try {
            
            DB::beginTransaction();
            $product  = new Product();
            $product->category_id  = $request->category_id;
            $product->user_id  = auth()->user()->id;
            $product->shop_id  = auth()->user()->shop->id;
            $product->product_name = $request->product_name;
            $product->slug = Str::slug($request->product_name);
            $product->price = $request->price;
            $product->product_code = $request->product_code;
            $product->product_qty = $request->product_qty;
            $product->discount = $request->discount;
            $product->short_description = $request->short_description;
            $product->save();

            //store product main image
            $mainImageName = time() . '_main_image.' . $request->main_image->extension();
            $request->main_image->move(public_path('images'), $mainImageName);
            $media = new Media();
            $media->name = '/images/' . $mainImageName;
            $media->parent_id = $product->id;
            $media->type = 'product_main_image';
            $media->save();

            $product['main_image'] = $media->name;


            if ($request->hasFile('other_image')) {

                foreach($request->other_image as $key => $image){
                //store product other image
                $otherImageName = time() .rand(1000,9999). '_other_image.' . $image->extension();
                $image->move(public_path('images'), $otherImageName);
                $mediaOther = new Media();
                $mediaOther->name = '/images/' . $otherImageName;
                $mediaOther->parent_id = $product->id;
                $mediaOther->type = 'product_other_image';
                $mediaOther->save();
                $product['other_image_'.$key] = $mediaOther->name;
                }
            }



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
            $product  = Product::with('main_image')->where('slug', $slug)->first();
            $other_images = Media::where('parent_id',$product->id)->where('type', 'product_other_image')->get();
            $product['other_images']= $other_images;
            if (!$product) {
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
            $product  = Product::with(['main_image', 'other_image'])->find($id);
            if (!$product) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Product not Found',
                ], 404);
            }
            $product->category_id  = $request->category_id;
            $product->product_name = $request->product_name;
            $product->slug = Str::slug($request->product_name);
            $product->price = $request->price;
            $product->product_code = $request->product_code;
            $product->product_qty = $request->product_qty;
            $product->discount = $request->discount;
            $product->short_description = $request->short_description;
            $product->status = $request->status ? $request->status : null;
            $product->save();

            if ($request->has('main_image')) {
                $image_path = $product->main_image->name;
                File::delete(public_path($image_path));

                $imageName = time() . '_main_image.' . $request->main_image->extension();
                $request->main_image->move(public_path('images'), $imageName);
                $media = Media::where('type', 'product_main_image')->where('parent_id', $product->id)->update([
                    'name' => '/images/' . $imageName
                ]);
            }
            if ($request->has('other_image')) {

                
                $image_path = $product->other_image->name;
                File::delete(public_path($image_path));

                $imageName = time() . rand(1000, 9999) . '_other_image.' . $request->other_image->extension();
                $request->other_image->move(public_path('images'), $imageName);
                $media = Media::where('type', 'product_other_image')->where('parent_id', $product->id)->update([
                    'name' => '/images/' . $imageName
                ]);
            }

            $updatedProduct = Product::with(['main_image', 'other_image'])->where('id', $id)->first();
            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'product updated successfully',
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product  = Product::with(['main_image', 'other_image'])->find($id);
            if (!$product) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Product not Found',
                ], 404);
            }
            File::delete(public_path($product->main_image->name));
            $product->main_image->delete();
            File::delete(public_path($product->other_image->name));
            $product->other_image->delete();
            $product->delete();
            return response()->json([
                'success' => true,
                'msg' => 'product remove successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' =>  $e->getMessage(),
            ], 400);
        }
    }
}
