<?php

namespace App\Services;

use App\Services\Phone;
use GuzzleHttp\Client;

class Zenziva
{
    public static function sendShortMessage($phoneNumber = "", $message = "")
    {
        try {
            if (!$phoneNumber) {
                return ['status' => false, 'message' => 'there is no recipient number!'];
            }

            if (!$message) {
                return ['status' => false, 'message' => 'there is no message!'];
            }

            $phoneNumber = Phone::setupHandPhoneNumber($phoneNumber);

            $username = env('ZENZIVA_USER');
            $password = env('ZENZIVA_PASS');

            $params = [
                'userkey' => $username,
                'passkey' => $password,
                'to'      => $phoneNumber,
                'message' => $message
            ];

            $zenziva = new Client(['base_uri' => 'https://console.zenziva.net']);
            $response = $zenziva->request('POST', '/reguler/api/sendsms/', ['form_params' => $params]);

            $response = json_decode($response->getBody()->getContents(), true);

            if (!$response['status']) {
                return ['status' => false, 'message' => $response['text']];
            }

            return ['status' => true, 'message' => $response['text']];
        } catch (\Exception $e) {
            return ['status' => false, 'message' => 'Oops something went wrong!'];
        }
    }
}
