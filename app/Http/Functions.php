<?php


namespace App\Http;


class Functions
{
    public static function isProductionMode()
    {
        return config('app.app_mode')==='production';
    }
}
