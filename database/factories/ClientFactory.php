<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'defaulter' => rand(0,1),
        'date_birth' => $faker->date(),
        'sex' => rand(1,10)%2==0?'m':'f',
        'marital_status' => rand(1,3),
        'physical_disability' => rand(1,10)%2==0? $faker->word:null,
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