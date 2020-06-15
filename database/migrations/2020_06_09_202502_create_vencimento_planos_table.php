<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVencimentoPlanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vencimento_planos', function (Blueprint $table) {
            $table->bigIncrements('id_vencimento');
            $table->unsignedBigInteger('id_plano');
            $table->unsignedBigInteger('id_cliente');
            $table->date('vencimento');

            //TODO: Checar implicações
            $table->foreign('id_plano')->references('id_plano')->on('planos')
                ->onDelete('cascade');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes')
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
        Schema::dropIfExists('vencimento_planos');
    }
}
