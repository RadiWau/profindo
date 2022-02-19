<?php

namespace App\Providers;

use App\TBatch;
use App\TSetting;
use App\TProductionItem;
use Exception;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Config\Repository;
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
    public function boot(Repository $appConfig)
    {
        


    }
}
