<?php

namespace App\Http\Controllers\API\V1\Theme;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use App\Traits\sendApiResponse;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    use sendApiResponse;
    public function getThemesByType(Request $request)
    {
        return $query = Theme::query()->with('media')->get();
        if($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }
        $themes = $query->get();

        $this->sendApiResponse($themes);
    }
}
