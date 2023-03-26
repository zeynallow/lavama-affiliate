<?php

namespace App\Helpers;


class HandlerHelper
{

    public static function getErrorMessage($e)
    {
        if (config('app.env') === 'production') {
            return "Something went error...";
        }
        return $e->getMessage();
    }

}
