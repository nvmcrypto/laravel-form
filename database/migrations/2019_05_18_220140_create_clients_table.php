<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /** 
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('document_number');//modificar o tamanho de cpf/cnpj
            $table->string('email');
            $table->string('phone');
            $table->boolean('defaulter');//inadimplente
            $table->date('date_birth');
            $table->char('sex',10);
            $table->enum('marital_status',array_keys(\App\Client::MARITAL_STATUS));//puxando do model Client
            $table->string('physical_disability')->nullable();// aceita null
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
