<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ZonnenbrandAdvies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('zonnenbrandadviezen',function(Blueprint $table){
            $table->increments('id');
            $table->integer('advies_id')->unsigned();
            $table->integer('factor');
            $table->string('tekst');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('zonnenbrandadviezen');
    }
}
