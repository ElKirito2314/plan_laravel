<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanEmpregadosFerramentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_empregados_ferramentas', function (Blueprint $table) {
            //coluna
            $table->id();
            $table->date('data_retirada');
            $table->integer('quantidade');
            $table->unsignedBigInteger('endereco_id');
            $table->unsignedBigInteger('empregado_id');
            $table->unsignedBigInteger('ferramenta_id');
            $table->timestamps();

            //constraint
            $table->foreign('endereco_id')->references('id')->on('plan_enderecos');
            $table->foreign('empregado_id')->references('id')->on('plan_empregados');
            $table->foreign('ferramenta_id')->references('id')->on('plan_ferramentas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_empregados_ferramentas');
    }
}