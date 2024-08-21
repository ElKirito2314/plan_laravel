<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanEmpregadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_empregados', function (Blueprint $table) {
            //coluna
            $table->id();
            $table->string('nome', 65);
            $table->string('cpf', 18);
            $table->string('telefone', 13);
            $table->date('nascimento');
            $table->date('data_de_ingresso');
            $table->string('funcao', 60);
            $table->unsignedBigInteger('setor_id');
            $table->timestamps();

            //constraint
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
        Schema::dropIfExists('plan_empregados');
    }
}
