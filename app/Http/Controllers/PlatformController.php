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
            $isFileExist = Storage::exists('platform.json');
            $allDataPlatform = [];
            if ($isFileExist) {
                $platfomFileJson = Storage::get('platform.json');
                $allDataPlatform = json_decode($platfomFileJson, true);
            }

            return response()->json(['status' => true, 'data' => $allDataPlatform]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Oops something went wrong!']);
        }
    }

    public function create(Request $request)
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
                'platform_name.string' => 'platform name must be a string!',
                'platform_url.required' => 'platform url is required!',
                'platform_url.url' => 'platform url must be url!',
                'phone.required' => 'phone is required!',
                'email.required' => 'email is required!',
                'email.email' => 'email must email!',
                'address.required' => 'address is required!'
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

    public function update(Request $request, $platform)
    {
        try {
            $isFileExist = Storage::exists('platform.json');
            if (!$isFileExist) {
                return response()->json(['status' => false, 'message' => 'there is no data platform yet!']);
            }

            $allDataPlatformJson = Storage::get('platform.json');
            $allDataPlatform = json_decode($allDataPlatformJson, true);

            if (!array_key_exists($platform, $allDataPlatform)) {
                return response()->json(['status' => false, 'message' => 'data platform ' . $platform . ' does not exists!']);
            }

            $allDataPlatform[$platform] = [
                'url' => $request->platform_url ? $request->platform_url : $allDataPlatform[$platform]['url'] ,
                'phone' => $request->phone ? $request->phone : $allDataPlatform[$platform]['phone'] ,
                'email' => $request->email ? $request->email : $allDataPlatform[$platform]['email'] ,
                'address' => $request->address ? $request->address : $allDataPlatform[$platform]['address']
            ];

            $platformJson = json_encode($allDataPlatform);
            Storage::put('platform.json', $platformJson);

            return response()->json(['status' => true, 'message' => 'platform ' . $platform . ' updated']);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Oops something went wrong!']);
        }
    }
}
