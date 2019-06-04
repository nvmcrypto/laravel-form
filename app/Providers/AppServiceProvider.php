<?php

namespace App\Providers;

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
        \Schema::defaultStringLength(191);//Evita o erro com migrations no mysql
        $platform = \Schema::getConnection()->getDoctrineSchemaManager()->getDatabasePlatform(); //Retirando erro enum do doctrine 
        $platform->registerDoctrineTypeMapping('enum','string'); //Retirando erro enum do doctrine 
    }
}
