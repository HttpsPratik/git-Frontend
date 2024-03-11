<?php

namespace App\Facade;

use App\Classes\NepaliEnglishCalendar;
use Illuminate\Support\Facades\Facade;

class NepDate extends Facade
{
    /**
     * @method static string getNepaliDateTime($datetime)
     * @method static string getNepaliDate($date)
     */
    protected static function getFacadeAccessor(): string
    {
        return NepaliEnglishCalendar::class;
    }
}

