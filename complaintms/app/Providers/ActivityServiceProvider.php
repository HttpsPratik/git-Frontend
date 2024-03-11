<?php

namespace App\Providers;

use App\Facade\LogActivity;
use App\Repository\Interfaces\ActivityRepositoryInterface;
use App\Service\FiscalYearService;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class ActivityServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LogActivity::class, function (){
            $request = app(Request::class);
            $activityRepository = app(ActivityRepositoryInterface::class);
            $fiscalYearService = app(FiscalYearService::class);
            return new LogActivity($request, $activityRepository, $fiscalYearService);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
