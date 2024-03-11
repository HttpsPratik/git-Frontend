<?php

namespace App\Facade;

use App\Helpers\LogActivity as Logger;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string addToLog(String $description, String $admin_id = null)
 */

class LogActivity extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Logger::class;
    }
}

