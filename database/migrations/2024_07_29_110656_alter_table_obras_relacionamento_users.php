<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableObrasRelacionamentoUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('plan_obras', function(Blueprint $table) {
            //Colunas
            $table->unsignedBigInteger('user_id')->nullable()->after('id');

            //Constraint
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plan_obras', function(Blueprint $table) {
            $table->dropForeign('plan_obras_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
