<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperCommon extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // regist common
        require_once app_path() . '/Helpers/CommonHelper.php';
    }
}
