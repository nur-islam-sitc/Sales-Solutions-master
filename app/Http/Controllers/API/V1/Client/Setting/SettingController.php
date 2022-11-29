<?php

namespace App\Http\Controllers\API\V1\Client\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\MerchantSettingRequest;
use App\Models\MerchantInfo;
use App\Models\User;
use DB;

class SettingController extends Controller
{
    public function update_merchant_info(MerchantSettingRequest $request)
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

            $merchantInfo = MerchantInfo::where('user_id', auth()->user()->id)->first();
            if (!$merchantInfo) {
                $newMerchantInfo = new MerchantInfo();
                $newMerchantInfo->user_id = $merchant->id;
                $newMerchantInfo->short_address = $request->short_address;
                $newMerchantInfo->address = $request->address;
                $newMerchantInfo->fb_page = $request->fb_page;
                $newMerchantInfo->short_description = $request->short_description;
                $newMerchantInfo->description = $request->description;
                $newMerchantInfo->brand_color = $request->brand_color;
                $newMerchantInfo->brand_border_color = $request->brand_border_color;
                $newMerchantInfo->save();
                DB::commit();
                return response()->json([
                    'success' => true,
                    'msg' => 'merchant info create successfully',
                    'data' =>   $newMerchantInfo,
                ], 200);
            }

            $merchantInfo->user_id = $merchant->id;
            $merchantInfo->short_address = $request->short_address;
            $merchantInfo->address = $request->address;
            $merchantInfo->fb_page = $request->fb_page;
            $merchantInfo->short_description = $request->short_description;
            $merchantInfo->description = $request->description;
            $merchantInfo->brand_color = $request->brand_color;
            $merchantInfo->brand_border_color = $request->brand_border_color;
            $merchantInfo->save();
            DB::commit();
            return response()->json([
                'success' => true,
                'msg' => 'merchant info update successfully',
                'data' =>   $merchantInfo,
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
