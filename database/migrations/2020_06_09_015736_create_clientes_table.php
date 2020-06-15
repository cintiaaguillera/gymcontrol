<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id_cliente');
            $table->string('nome');
            $table->string('cpf')->unique();
            $table->string('rg')->unique();
            $table->string('matricula')->unique();
            $table->string('endereco');
            $table->unsignedBigInteger('id_plano');
            //TODO: checar implicações
            $table->foreign('id_plano')->references('id_plano')->on('planos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
