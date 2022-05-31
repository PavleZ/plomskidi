<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipKljucneReciAndAddEntitetId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kljucna_rec', function (Blueprint $table) {

            $table->integer("entitetId");
            $table->integer('tipKljucneReciId')->unsigned()->nullable();


            $table->foreign('tipKljucneReciId')->references('id')->on('tip_kljucne_reci');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kljucna_rec', function (Blueprint $table) {
            $table->dropColumn("entitetId");

            $table->dropForeign(['tipKljucneReciId']);

            $table->dropColumn('tipKljucneReciId');
        });
    }
}
