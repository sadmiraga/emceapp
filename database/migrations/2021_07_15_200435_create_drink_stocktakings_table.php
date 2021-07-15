<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrinkStocktakingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */



    // zacnes popis
    //CREATES
    // QUANTITY NULL
    // ako pice nema tezinu stvais vrijednost koju ne hvata  ( NOT NULL)
    //  WEIGHT = null;

    //WHEN CHECK
    // 0 mora da se mijenja, null znaci da nema tu vriednost uopste



    public function up()
    {
        Schema::create('drink_stocktakings', function (Blueprint $table) {
            $table->increments('id');

            //stocktaking  == so you know what stocktaking does the info belong
            $table->unsignedInteger('stocktaking_id')->unsigned();
            $table->foreign('stocktaking_id')->references('id')->on('stocktakings');

            //drinks == so you about what drink data is about
            $table->unsignedInteger('drink_id')->unsigned();
            $table->foreign('drink_id')->references('id')->on('drinks');

            $table->integer('quantity')->nullable()->default(null);
            $table->double('weight')->nullable()->default(null);





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
        Schema::dropIfExists('drink_stocktakings');
    }
}
