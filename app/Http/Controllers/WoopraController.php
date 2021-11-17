<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Woopra;
use App\Services\Platform;
use Illuminate\Support\Facades\Validator;

class WoopraController extends Controller
{
    public function general(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'domain' => 'required',
                'user_name' => 'required',
                'user_email' => 'required|email',
                'user_phone' => 'required',
                'event_name' => 'required',
                'event_data' => 'required|array'
            ], [
                'domain.required' => 'Please add domain name',
                'user_name.required' => 'Please add user name',
                'user_email.required' => 'Please add user email',
                'user_email.email' => 'Please add a valid email',
                'user_phone.required' => 'Please add user phone number',
                'event_name.required' => 'Please add event name',
                'event_data.required' => 'Please add event data',
                'event_data.array' => 'Please send event data in array'
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => $validator->errors()->all()]);
            }

            $woopraEventGeneral = (new Woopra())->generalEvent($request->all());

            return response()->json($woopraEventGeneral);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Err exception : failed to process track woopra general event']);
        }
    }
}
