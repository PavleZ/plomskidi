<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePredmetStavkaPredmetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predmet_stavka_predmeta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('predmetID');
            $table->unsignedBigInteger('stavka_predmetaID');

            $table->foreign('predmetID')->references('id')->on('predmet');
            $table->foreign('stavka_predmetaID')->references('id')->on('stavka_predmeta');
            $table->string('odgovor',200);
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
        Schema::dropIfExists('predmet_stavka_predmetas');
    }
}
