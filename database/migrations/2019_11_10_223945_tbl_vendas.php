<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblVendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_vendas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('vrunit', 14,2)->default(0);
            $table->double('vrtotal', 14,2)->default(0);
            $table->integer('quantidade')->length(10)->default(0);
            $table->unsignedBigInteger('fk_usuario');
            $table->foreign('fk_usuario')->references('id')->on('tbl_usuarios');
            $table->unsignedBigInteger('fk_drink');
            $table->foreign('fk_drink')->references('id')->on('tbl_drinks');
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
        Schema::drop('tbl_vendas');
    }
}
