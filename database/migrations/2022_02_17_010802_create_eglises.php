<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEglises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eglises', function (Blueprint $table) {
            $table->bigIncrements('id_eg');
            $table->string('nom');
            $table->string('logo');
            $table->integer('active');
            $table->string('lien');
            $table->text('des');
            $table->string('tel');
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
        Schema::dropIfExists('eglises');
    }
}
