<?php

namespace App\Providers;

use App\Models\AnonymousTicket;
use App\Models\Ticket;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        JsonResource::withoutWrapping();
        Paginator::useBootstrap();

        /**
         * Determine if integer are equal or not.
         *
         * @return bool
         */
        Validator::extend('eq', function ($attribute, $value, $parameters, $validator) {
            return (int)$parameters[0] == (int)$value;
        });

        /**
         * Determine if old password matches.
         *
         * @return bool
         */
        Validator::extend('match_ticket_password', function($attribute, $value, $parameters, $validator){
            return Hash::check($value, AnonymousTicket::select(['password'])
                ->where('ticket_number', $parameters[0])
                ->first()->password
            );
        });

        /**
         * Determine if all uploaded file size cross certain limit.
         *
         * @return bool
         */
        Validator::extend('max_uploaded_file_size', function ($attribute, $value, $parameters, $validator) {

            $total_size = array_reduce($value, function ($sum, $item) {
                // each item is UploadedFile Object
                $sum += filesize($item->path());
                return $sum;
            });

            // $parameters[0] in kilobytes
            return $total_size < $parameters[0] * 1024;

        });

         /**
         * Determine if integer are equal or not.
         *
         * @return bool
         */
        Validator::extend('data_exists', function ($attribute, $value, $parameters, $validator) {
            return $parameters[0];
        });

        /**
         * File size (bytes) to human readable kb, mb, ... and soon.
         *
         * @return string
         */
        File::macro('fileToHumanReadable', function ($path, $precision = 2) {
            $size = File::size(public_path($path));
            if ($size > 0) {
                $base = log($size) / log(1024);
                $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');
                return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
            }
            return $size;
        });

        View::composer(['frontend.containers.latest-grivances'], function ($view) {
            $view->with('public_grivances',
                Cache::remember('public_grivances', 22 * 60, function () {
                    return Ticket::orderBy('created_at', 'desc')->where('visible', true)->with('category')->limit(6)->get();
                }));
        });
    }
}
