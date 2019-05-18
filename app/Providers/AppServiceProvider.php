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
        //php artisan make:factory ClientFactory --model=App/Client - criando uma factory de cliente
        // $client = factory(\App\Client::class,5)->make() - gera os dados da classe factory no tinker(php artisan tinker) e o create() cria os dados na base
    }
}
