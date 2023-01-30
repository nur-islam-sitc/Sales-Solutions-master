<?php

namespace App\Http\Controllers\API\V1\Client\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use App\Traits\sendApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageController extends Controller
{
    use sendApiResponse;

    public function index(Request $request): JsonResponse
    {
        $page = Page::query()->where('shop_id', $request->header('shop-id'))->get();
        if ($page->isEmpty()) {
            return $this->sendApiResponse('', 'No data available right now', 'NotAvailable');
        }
        return $this->sendApiResponse($page);
    }


    public function create()
    {

    }


    public function store(PageRequest $request)
    {
        //return $request->all();
        try {

            DB::beginTransaction();
            $page = new Page();
            $page->user_id = auth()->user()->id;
            $page->shop_id = auth()->user()->shop->shop_id;
            $page->title = $request->title;
            $page->slug = Str::slug($request->title);
            $page->page_content = $request->page_content;
            $page->theme = $request->theme;
            $page->status = $request->status;
            $page->save();


            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'Page created successfully',
                'data' => $page,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' => $e->getMessage(),
            ], 400);
        }
    }


    public function show(Request $request, $slug): JsonResponse
    {

        $page = Page::query()->where('slug', $slug)->where('shop-id', $request->header('shop-id'))->first();
        if (!$page) {
            return $this->sendApiResponse('', 'Page not Found', 'NotFound');
        }

        return $this->sendApiResponse($page);


    }


    public function edit($id)
    {

    }

    public function update(PageRequest $request, $id)
    {
        try {

            DB::beginTransaction();
            $page = Page::find($id);
            if (!$page) {
                return response()->json([
                    'success' => false,
                    'msg' => 'Page not Found',
                ], 404);
            }

            $page->title = $request->title;
            $page->slug = Str::slug($request->title);
            $page->page_content = $request->page_content;
            $page->theme = $request->theme;
            $page->save();


            $updatedPage = Page::where('id', $id)->first();
            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'Page updated successfully',
                'data' => $updatedPage,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' => $e->getMessage(),
            ], 400);
        }
    }


    public function destroy($id)
    {
        try {
            $page = Page::find($id);
            if (!$page) {
                return response()->json([
                    'success' => false,
                    'msg' => 'Page not Found',
                ], 404);
            }


            $page->delete();
            return response()->json([
                'success' => true,
                'msg' => 'Page remove successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' => $e->getMessage(),
            ], 400);
        }
    }
}
