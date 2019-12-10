<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblIngredientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ingredientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nmingrediente');
            $table->string('tipo');
            $table->double('quantidade_total_ml', 5, 2);
            $table->date('validade');
            $table->double('vrunitario', 14, 2);
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
        Schema::drop('tbl_ingredientes');
    }
}
