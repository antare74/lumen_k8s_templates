<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\Zenziva;

class ShortMessageController extends Controller
{
    public function send(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'recipient_number' => 'required',
                'message' => 'required'
            ], [
                'recipient_number.required' => 'recipient number is required!',
                'message.required' => 'message is required!'
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => $validator->errors()->all()]);
            }

            $sendShortMessage = Zenziva::sendShortMessage($request->recipient_number, $request->message);

            return response()->json($sendShortMessage);

        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'oops something went wrong']);
        }
    }
}
