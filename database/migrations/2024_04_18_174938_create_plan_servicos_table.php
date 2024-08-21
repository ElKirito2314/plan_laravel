<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_servicos', function (Blueprint $table) {
            //coluna
            $table->id();
            $table->date('data_inicio');
            $table->string('atividade', 45);
            $table->unsignedBigInteger('responsavel_id');
            $table->unsignedBigInteger('obra_id');
            $table->unsignedBigInteger('setor_id');
            $table->timestamps();

            //constraint
            $table->foreign('responsavel_id')->references('id')->on('plan_empregados');
            $table->foreign('obra_id')->references('id')->on('plan_obras');
            $table->foreign('setor_id')->references('id')->on('plan_setores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_servicos');
    }
}
