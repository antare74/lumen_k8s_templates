<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlatformController extends Controller
{
    public function index()
    {
        try {
            $platfomFileJson = Storage::get('platform.json');
            $platformArray = json_decode($platfomFileJson, true);

            return response()->json(['status' => true, 'data' => $platformArray]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Oops something went wrong!']);
        }
    }

    public function addPlatform(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'platform_name' => 'required|string',
                'platform_url'  => 'required|url',
                'phone' => 'required',
                'email' => 'required|email',
                'address' => 'required',
            ], [
                'platform_name.required' => 'platform name is required!',
                'platform_name.string' => 'platform name must be a string'
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => $validator->errors()->all()]);
            }

            $allDataPlatform = [];

            $isFileExist = Storage::exists('platform.json');
            if ($isFileExist) {
                $allDataPlatformJson = Storage::get('platform.json');
                $allDataPlatform = json_decode($allDataPlatformJson, true);
            }

            if (array_key_exists($request->platform_name, $allDataPlatform)) {
                return response()->json(['status' => false, 'message' => 'data platform already exist']);
            }

            $allDataPlatform[$request->platform_name] = [
                'url' => $request->platform_url,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address
            ];
            $platformJson = json_encode($allDataPlatform);
            Storage::put('platform.json', $platformJson);

            return response()->json(['status' => true, 'message' => 'platform name saved']);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Oops something went wrong!']);
        }
    }
}
