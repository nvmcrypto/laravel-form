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
        //lISTA DE CODIGOS UTILIZADOS NO CURSO
        //php artisan make:model Client -m - cria o model e o migration ao mesmo tempo
        //composer dumpautoload - Deve rodar esse comando caso exclua um model e/ou migration
    }
}
