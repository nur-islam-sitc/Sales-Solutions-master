<?php

namespace App\Http\Controllers\API\V1\Client\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\MerchantSettingRequest;
use App\Models\Media;
use App\Models\MerchantInfo;
use App\Models\Shop;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function business_info(MerchantSettingRequest $request)
    {
        try {
            DB::beginTransaction();
            $merchant = User::where('role', 'merchant')->find(auth()->user()->id);
            if (!$merchant) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Merchant not Found',
                ], 404);
            }
            $shop  = Shop::with('shop_logo')->where('user_id', $merchant->id)->first();
            if (!$shop) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Shop not Found',
                ], 404);
            }


            DB::commit();
            return response()->json([
                'success' => true,
                'data' =>    $shop,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' =>   $e->getMessage(),
            ], 400);
        }
    }


    public function business_info_update(MerchantSettingRequest $request)
    {

        try {
            DB::beginTransaction();
            $merchant = User::where('role', 'merchant')->find(auth()->user()->id);
            if (!$merchant) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Merchant not Found',
                ], 404);
            }

            $shop = Shop::where('user_id', $merchant->id)->first();
            $shop->name = $request->shop_name;
            $shop->address = $request->shop_address;
            $shop->shop_id = $request->shop_id;
            $shop->shop_meta_title = $request->shop_meta_title;
            $shop->shop_meta_description = $request->shop_meta_description;
            $shop->save();

            //store shop logo
            $mainImageName = time() . '_shop_logo.' . $request->shop_logo->extension();
            $request->shop_logo->move(public_path('images'), $mainImageName);
            $media = new Media();
            $media->name = '/images/' . $mainImageName;
            $media->parent_id = $shop->id;
            $media->type = 'shop_logo';
            $media->save();

            $shop['logo'] = $media->name;

            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'merchant setting business information update successfully',
                'data' =>    $shop,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' =>   $e->getMessage(),
            ], 400);
        }
    }

    public function owner_info_update(MerchantSettingRequest $request)
    {

        try {
            DB::beginTransaction();
            $merchant = User::where('role', 'merchant')->find(auth()->user()->id);
            if (!$merchant) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Merchant not Found',
                ], 404);
            }

            $merchant->name = $request->owner_name;
            $merchant->email = $request->owner_email;
            $merchant->phone = $request->owner_number;
            $merchant->save();

            $merchantInfo = MerchantInfo::where('user_id', $merchant->id)->first();
            $merchantInfo->address = $request->owner_address;
            $merchantInfo->other_info = $request->owner_other_info;
            $merchantInfo->save();

            $ownerInfo = [
                'owner_name' => $merchant->name,
                'owner_email' => $merchant->email,
                'owner_number' => $merchant->phone,
                'owner_address' => $merchantInfo->address,
                'owner_other_info' => $merchantInfo->other_info,
            ];



            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'merchant setting owner information update successfully',
                'data' =>    $ownerInfo,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' =>   $e->getMessage(),
            ], 400);
        }
    }

    public function owner_info(MerchantSettingRequest $request)
    {
        try {
            DB::beginTransaction();
            $merchant = User::where('role', 'merchant')->find(auth()->user()->id);
            if (!$merchant) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Merchant not Found',
                ], 404);
            }
            $merchantInfo  = MerchantInfo::where('user_id', $merchant->id)->first();
            if (!$merchantInfo) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Merchant info not found',
                ], 404);
            }

            $ownerInfo = [
                'owner_name' => $merchant->name,
                'owner_email' => $merchant->email,
                'owner_number' => $merchant->phone,
                'owner_address' => $merchantInfo->address,
                'owner_other_info' => $merchantInfo->other_info,
            ];


            DB::commit();
            return response()->json([
                'success' => true,
                'data' =>    $ownerInfo,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' =>   $e->getMessage(),
            ], 400);
        }
    }

    public function password_security_update(MerchantSettingRequest $request)
    {
        try {
            DB::beginTransaction();
            $merchant = User::where('role', 'merchant')->find(auth()->user()->id);
            if (!$merchant) {
                return response()->json([
                    'success' => false,
                    'msg' =>  'Merchant not Found',
                ], 404);
            }
            
            #Match The Old Password
            if(!Hash::check($request->old_password, $merchant->password)){
                return response()->json([
                    'success' => false,
                    'msg' =>  'Old Password Doesn\'t match!',
                ], 404);
            }

            #Update the new Password
            User::whereId($merchant->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            
            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'merchant setting password update successfully'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'msg' =>   $e->getMessage(),
            ], 400);
        }
    }
}
