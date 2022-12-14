<?php

namespace App\Http\Controllers\API\V1\Client\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $category  = Category::with('category_image')->get();
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            DB::beginTransaction();
            $category = new Category();
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->description = $request->description;
            $category->shop_id = auth()->user()->shop->id;
            $category->user_id = auth()->user()->id;
            $category->parent_id = $request->parent_id;
            $category->status = $request->status;
            $category->save();

            //store category image
            $imageName = time() . '.' . $request->category_image->extension();
            $request->category_image->move(public_path('images'), $imageName);
            $media = new Media();
            $media->name = '/images/' . $imageName;
            $media->parent_id = $category->id;
            $media->type = 'category';
            $media->save();
            DB::commit();
            $category['image'] = $media->name;

            return response()->json([
                'success' => true,
                'msg' => 'Category created Successfully',
                'data' =>   $category,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' =>   $e->getMessage(),
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
            $category = Category::with('category_image')->where('slug', $slug)->first();
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $category = Category::with('category_image')->find($id);
            if (!$category) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Category not Found',
                ], 404);
            }

            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->description = $request->description;
            $category->parent_id = $request->parent_id;
            $category->status = $request->status;
            $category->save();
            
            if ($request->has('category_image')) {
                $image_path = $category->category_image->name;
                File::delete(public_path($image_path));

                $imageName = time() . '.' . $request->category_image->extension();
                $request->category_image->move(public_path('images'), $imageName);
                $media = Media::where('type', 'category')->where('parent_id', $category->id)->update([
                    'name' => '/images/' . $imageName
                ]);
            }
            $updatedCategory = Category::with('category_image')->where('id',$id)->first();
            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'category updated successfully',
                'data' =>   $updatedCategory,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' =>   $e->getMessage(),
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
            $category = Category::with('category_image')->find($id);
            if (!$category) {
                return response()->json([
                    'success' => false,
                    'msg' => 'category not Found',
                ], 404);
            }
            File::delete(public_path($category->category_image->name));
            $category->category_image->delete();
            $category->delete();
            return response()->json([
                'success' => true,
                'msg' => 'category Deleted Successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' =>   $e->getMessage(),
            ], 400);
        }
    }
}
