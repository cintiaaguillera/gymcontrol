<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->bigIncrements('id_funcionario');
            $table->string('nome');
            $table->string('cpf')->unique();
            $table->string('rg')->unique();
            $table->unsignedBigInteger('id_tipo_funcionario');
            //TODO: checar implicações
            $table->foreign('id_tipo_funcionario')->references('id_tipo_funcionario')->on('tipo_funcionarios')
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
        Schema::dropIfExists('funcionarios');
    }
}
