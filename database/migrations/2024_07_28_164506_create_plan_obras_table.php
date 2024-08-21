<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanObrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_obras', function (Blueprint $table) {
            //Colunas
            $table->id();
            $table->string('nome', 65);
            $table->date('data_inicio');
            $table->string('imagem', 255);
            $table->unsignedBigInteger('endereco_id');
            $table->timestamps();

            //Constraints
            $table->foreign('endereco_id')->references('id')->on('plan_enderecos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_obras');
    }
}
