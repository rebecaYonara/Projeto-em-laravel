<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblDrinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_drinks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nmdrink');
            $table->double('vrdrink', 14, 2)->default(0.00);
            $table->double('qtd_ml_principal', 5, 2)->default(0.00);
            $table->double('qtd_ml_adicional', 5, 2)->default(0.00);
            $table->unsignedBigInteger('fk_ingrediente_principal')->default(0);
            $table->foreign('fk_ingrediente_principal')->references('id')->on('tbl_ingredientes');
            $table->unsignedBigInteger('fk_ingrediente_adicional')->default(0);
            $table->foreign('fk_ingrediente_adicional')->references('id')->on('tbl_ingredientes');
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
        Schema::drop('tbl_drinks');
    }
}
