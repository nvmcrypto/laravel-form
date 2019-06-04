<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Client;
use Faker\Generator as Faker;

require_once __DIR__.'/../faker_data/document_number.php';//Importando o arquivo document_number

$factory->define(Client::class, function (Faker $faker) {
    $cpfs = cpfs();
    return [
        'name' => $faker->name,
        //'document_number' => $cpfs[array_rand($cpfs,1)],
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'defaulter' => rand(0,1),
       // 'date_birth' => $faker->date(),
       //'sex' => rand(1,10)%2==0?'m':'f',
       //'marital_status' => rand(1,3),
       // 'physical_disability' => rand(1,10)%2==0? $faker->word:null,
    ];
});

$factory->state(\App\Client::class,\App\Client::TYPE_INDIVIDUAL,function (Faker $faker) {
    $cpfs = cpfs();
    return [
        'date_birth' => $faker->date(),
        'document_number' => $cpfs[array_rand($cpfs,1)],
        'sex' => rand(1,10)%2==0?'m':'f',
        'marital_status' => rand(1,3),
        'physical_disability' => rand(1,10)%2==0? $faker->word:null,
        'client_type' => \App\Client::TYPE_INDIVIDUAL
    ];
});


$factory->state(\App\Client::class,\App\Client::TYPE_LEGAL,function (Faker $faker) {
    $cnpjs = cnpjs();
    return [
        'document_number' => $cnpjs[array_rand($cnpjs,1)],
        'company_name' => $faker->company,
        'client_type' => \App\Client::TYPE_LEGAL,
        'sex' => 'N',
        'marital_status' => 4 //criei os valores padrões para marital_status e sex quando for empresa
    ];
});
/*$table->string('name');
$table->string('document_number');//modificar o tamanho de cpf/cnpj
$table->string('email');
$table->string('phone');
$table->boolean('defaulter');//inadimplente
$table->date('date_birth');
$table->char('sex',10);
$table->enum('marital_status',array_keys(\App\Client::MARITAL_STATUS));//puxando do model Client
$table->string('physical_disability')->nullable();// aceita null*/