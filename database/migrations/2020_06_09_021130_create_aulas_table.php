<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aulas', function (Blueprint $table) {
            $table->bigIncrements('id_aula');
            $table->string('nome')->unique();
            $table->unsignedBigInteger('id_funcionario')->nullable();
            //TODO: checar implicações
            $table->foreign('id_funcionario')->references('id_funcionario')->on('funcionarios')
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
        Schema::dropIfExists('aulas');
    }
}
