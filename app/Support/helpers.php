<?php

use App\Setting;

if (! function_exists('getSetting')) {

    function getSetting($code)
    {
        return Setting::getValue($code);
    }
}