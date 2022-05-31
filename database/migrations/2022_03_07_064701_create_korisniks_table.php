<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKorisniksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('korisnik', function (Blueprint $table) {
            $table->bigIncrements ('id');
            $table->string('ime',50);
            $table->string('prezime',50);
            $table->string('email',50)->unique();
            $table->string('lozinka',100);
            $table->unsignedBigInteger('tipNalogaID');
            $table->foreign('tipNalogaID')->references('id')->on('tip_naloga');
            $table->boolean('isDeleted')->default(0);
            $table->boolean('isLogged')->default(0);
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
        Schema::dropIfExists('korisniks');
    }
}
