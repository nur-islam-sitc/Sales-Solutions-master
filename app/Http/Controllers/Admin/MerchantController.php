<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function index()
    {

        $merchants = User::query()->with('shop')
                                ->where('role', 'customer')
                                ->get();
        return view('panel.merchants.index', compact('merchants'));
    }
}
