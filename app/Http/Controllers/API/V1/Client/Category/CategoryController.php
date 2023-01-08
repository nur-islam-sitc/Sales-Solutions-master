<?php

namespace App\Http\Controllers\API\V1\Client\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Media;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $categories = Category::query()->with('subcategory', 'category_image')
            ->where('parent_id', 0)
            ->where('shop_id', $request->header('shop_id'))
            ->get();
        if ($categories->isEmpty()) {
            return $this->sendApiResponse('', 'No data available');
        }
        return $this->sendApiResponse($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return JsonResponse
     */
    public function store(CategoryRequest $request): JsonResponse
    {
        $query = Category::query()->where('shop_id', $request->header('shop_id'))->where('name', $request->input('name'))->first();
        if ($query) {
            throw validationException::withMessages(['category' => 'This category already exist']);
        }
        $data = $request->except('category_image');
        $data['slug'] = Str::slug($request->name);
        $data['shop_id'] = $request->header('shop_id');
        $data['parent_id'] = $request->input('parent_id') ?: 0;
        $data['user_id'] = auth()->user()->id;
        $category = Category::query()->create($data);

        if ($request->hasFile('category_image')) {
            //store category image
            $imageName = time() . '.' . $request->file('category_image')->getClientOriginalExtension();
            $request->file('category_image')->move(public_path('images/category'), $imageName);
            $media = new Media();
            $media->name = '/images/category/' . $imageName;
            $media->parent_id = $category->id;
            $media->type = 'category';
            $media->save();
        }
        $category->load('category_image');
        return $this->sendApiResponse($category, 'Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param $slug
     * @return JsonResponse
     */
    public function show(Request $request, $slug): JsonResponse
    {

        $category = Category::with('category_image', 'subcategory')
            ->where('slug', $slug)
            ->where('shop_id', $request->header('shop_id'))
            ->first();
        if (!$category) {
            return $this->sendApiResponse('', 'No category found');
        }
        return $this->sendApiResponse($category);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $category = Category::with('category_image')->find($id);
            if (!$category) {
                return response()->json([
                    'success' => false,
                    'msg' => 'Category not Found',
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
            $updatedCategory = Category::with('category_image')->where('id', $id)->first();
            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'category updated successfully',
                'data' => $updatedCategory,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' => $e->getMessage(),
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
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
            if ($category->category_image) {
                File::delete(public_path($category->category_image->name));
                $category->category_image->delete();
            }

            $category->delete();
            return response()->json([
                'success' => true,
                'msg' => 'category Deleted Successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' => $e->getMessage(),
            ], 400);
        }
    }

    public function getCategoryTreeForParentId($shopID, $parent_id = 0)
    {
        $categories = array();

        $result = Category::where('parent_id', $parent_id)->where('shop_id', $shopID)->get();
        foreach ($result as $mainCategory) {
            $category = array();
            $category['id'] = $mainCategory->id;
            $category['name'] = $mainCategory->name;
            $category['slug'] = $mainCategory->slug;
            $category['image'] = $mainCategory->category_image;
            $category['description'] = $mainCategory->description;
            $category['shop_id'] = $mainCategory->shop_id;
            $category['parent_id'] = $mainCategory->parent_id;
            $category['status'] = $mainCategory->status;
            $category['sub_categories'] = $this->getCategoryTreeForParentId($category['shop_id'], $category['id']);
            $categories[] = $category;
        }
        return $categories;
    }
}
