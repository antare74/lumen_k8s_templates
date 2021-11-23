<?php

namespace App\Services\Woopra;

class Validation
{
    public function arrayAndNotEmpty($params = [])
    {
        if (!is_array($params)) {
            return message('Params not valid');
        }

        if (empty($params)) {
            return message('Params is empty');
        }

        return message('valid', true);
    }
}
