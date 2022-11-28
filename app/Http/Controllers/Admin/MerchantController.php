<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;


class MerchantController extends Controller
{
    public function index()
    {
        return view('panel.merchants.index');
    }

    public function show(User $merchant)
    {
        return view('panel.merchants.details', compact('merchant'));
    }

    public function merchants(): JsonResponse
    {
        $merchants = User::query()->with('shop')
            ->where('role', 'merchant')
            ->paginate($this->limit());


        return response()->json($merchants);
    }

    public function statuses(): JsonResponse
    {
        $statuses = User::listStatus();

        return response()->json($statuses);
    }
}
