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
    //php artisan make:controller -  criando um controller
    //php artisan make:controller Admin\ClientsController --resource - cria o controller com as funções
    //php artisan route:list - lista todas as rotas
    //composer require doctrine/dbal:~2.5  -- Baixando a biblioteca dbal para executar as alterações de tabela pelo migrations


Route::get('/', function () {
    return view('welcome');
});


Route::group([
    'prefix' => 'admin',
     'namespace' => 'Admin'        
], function () {
    Route::resource('clients','ClientsController');
});

//NOMEANDO AS ROTAS
Route::name('meu-nome')->get('/rota-nomeada', function(){
    echo "Hello World!!";
});
//ou
/*Route::get('/rota-nomeada', function(){
    echo "Hello World!!";
})->name('meu-nome1');*/
//fim NOMEANDO AS ROTAS

/*Route::group(['prefix' => 'admin'], function () { //Precisaria ficar repetindo o nome da pasta Admin pois esta sem o namespace
    Route::resource('clients','Admin\ClientsController');
});*/