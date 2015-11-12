<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataSheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_sheets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('engine_id')->length(10)->unsigned();
            $table->foreign('engine_id')->references('id')->on('engines');
            $table->integer('kW');
            $table->integer('CV');
            $table->integer('Nm');
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
        Schema::drop('data_sheets');
    }
}
