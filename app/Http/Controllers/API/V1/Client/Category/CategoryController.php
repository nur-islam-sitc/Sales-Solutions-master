<?php

namespace App\Http\Controllers\API\V1\Client\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            $category  = Category::all();
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

            $category = new Category();
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->description = $request->description;
            $category->shop_id = 1;
            $category->user_id = 1;
            $category->parent_id = $request->parent_id;
            $category->status = $request->status;
            $category->save();
            return response()->json([
                'success' => true,
                'msg' => 'Category created Successfully',
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        try {
            $category = Category::where('slug', $slug)->first();
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

            $category = Category::find($id);
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
            return response()->json([
                'success' => true,
                'msg' => 'category updated successfully',
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            if (!$category) {
                return response()->json([
                    'success' => false,
                    'msg' => 'category not Found',
                ], 404);
            }
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
