<?php

namespace App;

use App\Exceptions\CustomException;
use Mockery\Exception;

class Setting extends Model
{
    public $timestamps = false;

    protected $casts = [
        'value' => 'array'
    ];

    public static function getValue($code) {

        $setting = static::where('code', $code)->get()->first();

        if(!$setting)
            return;

        return (count($setting->value) == 1)? $setting->value[0] : $setting->value;
    }
}