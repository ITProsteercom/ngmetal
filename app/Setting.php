<?php

namespace App;

use App\Exceptions\CustomException;
use Mockery\Exception;

class Setting extends Model
{
    public $timestamps = false;

    public static function getValue($code) {

        $setting = static::where('code', $code)->get(['value'])->first();

        if(!$setting)
            return;

        return $setting->value;
    }
}