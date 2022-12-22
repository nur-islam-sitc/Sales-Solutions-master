<?php

namespace App\Http\Controllers\API\V1\Customer;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6',
            'credentials' => 'required',
        ]);

        if ($request->hasHeader('shop_id') && $request->header('shop_id') !== null) {

            $shop = Shop::query()->where('shop_id', $request->header('shop_id'))->first();

            if (!$shop) {
                throw ValidationException::withMessages([
                    'shop_id' => 'Invalid Shop Id'
                ]);
            }

            if (is_numeric($request->input('credentials'))) {

                $user = User::query()->where('phone', $request->input('credentials'))
                    ->whereHas('customer_info', function ($query) use ($shop) {
                        return $query->where('merchant_id', $shop->id);
                    })->first();

                if(!$user) {
                    $register = User::query()->create([
                        'name' => $request->input('name'),
                        'phone' => $request->input('credentials'),
                    ]);

                    return response()->json(['message' => 'Registration Successful']);
                }
            }

            if(filter_var($request->input('credentials'))) {

            }
        }


    }
}
