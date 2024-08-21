<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAllTablesSoftdelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan_empregados', function(Blueprint $table){
            $table->softDeletes();
        });
        Schema::table('plan_empregados_ferramentas', function(Blueprint $table){
            $table->softDeletes();
        });
        Schema::table('plan_empregados_materiais', function(Blueprint $table){
            $table->softDeletes();
        });
        Schema::table('plan_empregados_veiculos', function(Blueprint $table){
            $table->softDeletes();
        });
        Schema::table('plan_ferramentas', function(Blueprint $table){
            $table->softDeletes();
        });
        Schema::table('plan_materiais', function(Blueprint $table){
            $table->softDeletes();
        });
        Schema::table('plan_servicos', function(Blueprint $table){
            $table->softDeletes();
        });
        Schema::table('plan_setores', function(Blueprint $table){
            $table->softDeletes();
        });
        Schema::table('plan_veiculos', function(Blueprint $table){
            $table->softDeletes();
        });
        Schema::table('site_contatos', function(Blueprint $table){
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plan_empregados', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::table('plan_empregados_ferramentas', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::table('plan_empregados_materiais', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::table('plan_empregados_veiculos', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::table('plan_ferramentas', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::table('plan_materiais', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::table('plan_servicos', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::table('plan_setores', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::table('plan_veiculos', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
        Schema::table('site_contatos', function(Blueprint $table){
            $table->dropSoftDeletes();
        });
    }
}
