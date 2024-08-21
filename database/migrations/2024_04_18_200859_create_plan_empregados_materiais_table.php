<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanEmpregadosMateriaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_empregados_materiais', function (Blueprint $table) {
            $table->id();
            $table->date('data_retirada');
            $table->integer('quantidade');
            $table->unsignedBigInteger('endereco_id');
            $table->unsignedBigInteger('empregado_id');
            $table->unsignedBigInteger('material_id');
            $table->timestamps();

            //constraint
            $table->foreign('endereco_id')->references('id')->on('plan_enderecos');
            $table->foreign('empregado_id')->references('id')->on('plan_empregados');
            $table->foreign('material_id')->references('id')->on('plan_materiais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_empregados_materiais');
    }
}
