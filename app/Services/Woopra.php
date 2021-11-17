<?php

namespace App\Services;

use WoopraTracker;

class Woopra {

    public function validateWoopraArrayParams($params=[])
    {
        if (!is_array($params)) {
            return ['status' => false, 'message' => 'Params type does not valid'];
        }

        if (empty($params)) {
            return ['status' => false, 'message' => 'Params is empty'];
        }

        if (!array_key_exists('domain', $params)) {
            return ['status' => false, 'message' => 'Param domain does not exists'];
        }

        if (!array_key_exists('user_name', $params)) {
            return ['status' => false, 'message' => 'Param user_name does not exists'];
        }

        if (!array_key_exists('user_email', $params)) {
            return ['status' => false, 'message' => 'Param user_email does not exists'];
        }

        if (!array_key_exists('user_phone', $params)) {
            return ['status' => false, 'message' => 'Param user_phone does not exists'];
        }

        if (!array_key_exists('event_name', $params)) {
            return ['status' => false, 'message' => 'Param event_name does not exists'];
        }

        if (!array_key_exists('event_data', $params)) {
            return ['status' => false, 'message' => 'Param event_data does not exists'];
        }

        return ['status' => true, 'message' => 'params valid'];
    }

    public function generalEvent($params=[])
    {
        try {
            $isParamsValid = $this->validateWoopraArrayParams($params);
            if (!$isParamsValid['status']) {
                return $isParamsValid;
            }

            $woopra = new WoopraTracker(['domain' => $params['domain']]);
            $woopra->config(['ping' => false]);
            $woopra->identify([
                'name' => $params['user_name'],
                'email' => $params['user_email'],
                'phone' => $params['user_phone']
            ]);
            $woopra->track($params['event_name'], $params['event_data'],TRUE);

            return ['status' => true, 'message' => 'Event tracked to woopra'];
        }catch (\Exception $e) {
            return ['status' => false, 'message' => 'Err exception : woopra service failed to process general event method'];
        }
    }
}
