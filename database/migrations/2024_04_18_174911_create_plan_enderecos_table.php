<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_enderecos', function (Blueprint $table) {
            //coluna
            $table->id();
            $table->string('proprietario', 65);
            $table->string('bairro', 65);
            $table->string('cep', 9);
            $table->string('rua', 100);
            $table->unsignedInteger('numero');
            $table->string('maps', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan_enderecos');
    }
}
