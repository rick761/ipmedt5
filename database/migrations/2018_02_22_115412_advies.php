<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Advies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('adviezen',function(Blueprint $table){
            $table->increments('id');
            $table->integer('zonkracht');
            $table->enum('categorie', array('vrijwel geen', 'zwak','matig','sterk','zeer sterk','gevaarlijk'));
            $table->string('tekst');
            $table->enum('huidtype', array('1','2','3','4'));
            $table->integer('minuten');
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
        Schema::dropIfExists('adviezen');
    }
}