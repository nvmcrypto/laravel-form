<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//lISTA DE CODIGOS UTILIZADOS NO CURSO
    //php artisan make:model Client -m - cria o model e o migration ao mesmo tempo
    //composer dumpautoload - Deve rodar esse comando caso exclua um model e/ou migration
    //php artisan make:factory ClientFactory --model=App/Client - criando uma factory de cliente
    // $client = factory(\App\Client::class,5)->make() - gera os dados da classe factory no tinker(php artisan tinker) e o create() cria os dados na base
    //\App\Client::all(); - confirma se os dados foram cadastrados na base depois de executar o create()
    //php artisan make:seeder ClientsTableSeeder - comando para criar o seeder que vai utilizar o factory para inserir os dados faker na tabela sem o tinker
    //php artisan db:seed - executa as seeds no terminal
    //php artisan migrate:refresh --seed - Desfaz todas as migrações e seeds e executa novamente

    
Route::get('/', function () {
    return view('welcome');
});
