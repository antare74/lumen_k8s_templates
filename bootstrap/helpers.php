<?php

if (! function_exists('message')) {
    function message($message = '', $status = false)
    {
        return ['status' => $status, 'message' => $message];
    }
}
