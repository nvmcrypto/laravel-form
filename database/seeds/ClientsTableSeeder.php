<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Client::class,5)->states(\App\Client::TYPE_INDIVIDUAL)->create();//criando 5 dados faker de clientes no banco de dados
        factory(\App\Client::class,5)->states(\App\Client::TYPE_LEGAL)->create();
    }
}
