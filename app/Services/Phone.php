<?php

namespace App\Services;

class Phone
{
    public static function setupHandPhoneNumber($phoneNumber)
    {
        $phoneNumber = str_replace("-", "", $phoneNumber);
        $phoneNumber = str_replace(" ", "", $phoneNumber);
        $phoneNumber = str_replace('+63','0',$phoneNumber);
        $phoneNumber = str_replace('+62','0',$phoneNumber);
        $phoneNumber = str_replace('+','',$phoneNumber);

        return $phoneNumber;
    }
}
