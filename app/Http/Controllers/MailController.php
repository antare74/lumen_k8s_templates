<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DefaultMail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function send(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'platform_name' => 'required',
                'recipient_mail' => 'required',
                'recipient_name' => 'required',
                'subject' => 'required',
                'message' => 'required'
            ], [
                'platform_name.required' => 'platform name is required!',
                'recipient_mail.required' => 'recipient name is required!',
                'recipient_name.required' => 'recipient name is required!',
                'subject.required' => 'subject is required'
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

            if (!array_key_exists($request->platform_name, $allDataPlatform)) {
                return response()->json(['status' => false, 'message' => 'data platform does not exist']);
            }

            $platformData = $allDataPlatform[$request->platform_name];

            Mail::to($request->recipient_mail)->send(new DefaultMail($request->all(), $platformData));

            return response()->json(['status' => true, 'message' => 'success send email']);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'oops something went wrong']);
        }
    }
}
