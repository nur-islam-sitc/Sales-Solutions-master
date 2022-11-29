<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


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

    public function changeStatus(Request $request, User $merchant): JsonResponse
    {
        if($request->filled('status') == User::STATUS_ACTIVE) {
            $merchant->update(['status' => User::STATUS_ACTIVE]);
        }
        if($request->input('status') == User::STATUS_INACTIVE) {
            $merchant->update(['status' => User::STATUS_INACTIVE]);
        }
        if($request->input('status') == User::STATUS_BLOCKED) {
            $merchant->update(['status' => User::STATUS_BLOCKED]);
        }

        return response()->json(['success' => 'Status Updated Successfully']);
    }

    public function merchants(Request $request): JsonResponse
    {
        $query = User::query()->with('shop')
            ->where('role', 'merchant')
            ->latest();

        if($request->filled('search')) {
            $query->where('name', 'LIKE',  '%'.$request->input('search').'%');
        }
        if($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        if($request->filled('joining_date')) {
            $query->whereDate('created_at', $request->input('joining_date'));
        }
        $merchants = $query->paginate($this->limit());
        return response()->json($merchants);
    }

    public function statuses(): JsonResponse
    {
        $statuses = User::listStatus();

        return response()->json($statuses);
    }
}
