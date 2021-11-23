<?php

namespace App\Services\Woopra;

use Illuminate\Support\Facades\Validator;
use WoopraTracker;

class Woopra extends Validation
{
    public function generalEvent($params = []) {
        try {
            $arrayAndNotEmpty = $this->arrayAndNotEmpty($params);
            if (!$arrayAndNotEmpty['status']) {
                return $arrayAndNotEmpty;
            }

            $validator = Validator::make($params, [
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
                return message($validator->errors()->all());
            }

            $woopra = new WoopraTracker(['domain' => $params['domain']]);
            $woopra->config(['ping' => false]);
            $woopra->identify([
                'name' => $params['user_name'],
                'email' => $params['user_email'],
                'phone' => $params['user_phone']
            ]);
            $woopra->track($params['event_name'], $params['event_data'],TRUE);

            return message('Event tracked to woopra', true);
        } catch (\Exception $e) {
            return message('Err Exception : failed to process generalEvent method');
        }
    }
}
