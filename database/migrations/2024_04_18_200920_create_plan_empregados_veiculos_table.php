<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanEmpregadosVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_empregados_veiculos', function (Blueprint $table) {
            $table->id();
            $table->date('data_retirada');
            $table->unsignedBigInteger('empregado_id');
            $table->unsignedBigInteger('veiculo_id');
            $table->timestamps();

            //constraint
            $table->foreign('empregado_id')->references('id')->on('plan_empregados');
            $table->foreign('veiculo_id')->references('id')->on('plan_veiculos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_empregados_veiculos');
    }
}
