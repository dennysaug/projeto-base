<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('grupo_id')->unsigned();
            $table->integer('transacao_id')->unsigned();
            $table->timestamps();
            $table->unique(['grupo_id', 'transacao_id']);

            $table->foreign('grupo_id')->references('id')->on('grupo_usuarios');
            $table->foreign('transacao_id')->references('id')->on('transacaos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('permissao', function (Blueprint $table) {
            $table->dropForeign('grupo_id');
            $table->dropForeign('transacao_id');
        });
    }
}
