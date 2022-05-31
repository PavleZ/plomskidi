<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKljucnaRecLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kljucna_rec_link', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('kljucnaRecId');
            $table->string('link');

            $table->foreign('kljucnaRecId')->references('id')->on('kljucna_rec');


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
        Schema::dropIfExists('kljucna_rec_links');
    }
}
