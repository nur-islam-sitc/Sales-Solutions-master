<?php

namespace App\Http\Controllers\Merchant\Auth;

use App\Http\Controllers\Controller;

use App\Http\Requests\Merchant\MerchantRegister;
use App\Models\User;
use Illuminate\Support\Arr;

class LoginController extends Controller
{
    public function register(MerchantRegister $request)
    {
        $data = Arr::except($request->validated(), 'shop_name, domain');
        $data['role'] = User::MERCHANT;
        $merchant = User::query()->create($data);

        $merchant->shop()->create($request->validated());


    }
}
