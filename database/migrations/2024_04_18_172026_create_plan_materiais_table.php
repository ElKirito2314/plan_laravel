<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanMateriaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_materiais', function (Blueprint $table) {
            //coluna
            $table->id();
            $table->string('nome', 65);
            $table->string('cor', 20);
            $table->string('marca', 20);
            $table->integer('quantidade')->nullable();
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
        Schema::dropIfExists('plan_materiais');
    }
}
