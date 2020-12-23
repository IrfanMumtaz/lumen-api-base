<?php

namespace App\Helpers;

class TimestampHelper
{
    public static function timestampFormat($timestamp, $format = "Y-m-d H:i:s")
    {
        return $timestamp->format($format);
    }

    public static function addDays($days = 1, $format = "Y-m-d H:i:s")
    {
        $now = new \DateTime('now');
        $now->modify("$days day");

        return self::timestampFormat($now, $format);
    }
}
