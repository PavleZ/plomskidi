<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNazivEntitetaToKljucneReci extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kljucna_rec', function (Blueprint $table) {
            $table->string("entitetNaziv");

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
            //
        });
    }
}
