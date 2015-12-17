<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePdfContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdf_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('engine_id')->length(10)->unsigned();
            $table->foreign('engine_id')->references('id')->on('engines');
            $table->string('description');
            $table->binary('pdf');
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
        Schema::drop('pdf_contents');
    }
}
