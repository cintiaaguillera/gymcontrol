<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->bigIncrements('id_pagamento');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_plano');
            $table->date('dataVencimento');
            $table->date('dataPagamento');
            $table->date('dataProximoPagamento');
            $table->float('valorPago');
            $table->boolean('vigenciaContrato');
            $table->enum('forma_pagamento', ['Débito', 'Crédito','Dinheiro']);

            //TODO: checar implicações
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')
                ->onDelete('cascade');
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
        Schema::dropIfExists('pagamentos');
    }
}
