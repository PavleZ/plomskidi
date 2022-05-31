<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformacijasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informacija', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('naziv',70);
            $table->unsignedBigInteger('tip_informacijeID');
            $table->foreign('tip_informacijeID')->references('id')->on('tip_informacije');
            $table->string('link',200);
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
        Schema::dropIfExists('informacijas');
    }
}
