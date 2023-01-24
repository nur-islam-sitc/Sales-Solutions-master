<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MerchantBaseController;
use App\Models\Page;
use App\Traits\sendApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PageController extends MerchantBaseController
{
    use sendApiResponse;

    public function show($page): JsonResponse
    {
        $page = Page::query()->with('theme')->where('slug', $page)->first();
        if(!$page) {
            return $this->sendApiResponse('', 'No page found', 'NotFound');
        }
        return $this->sendApiResponse($page);
    }
}
