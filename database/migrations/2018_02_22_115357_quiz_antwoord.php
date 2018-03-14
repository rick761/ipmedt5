<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuizAntwoord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizantwoorden',function(Blueprint $table){
            $table->increments('id');
            $table->integer('vraag_id')->unsigned();
            $table->string('tekst');
            $table->enum('letter',["a","b","c","d"]);
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
    }
}
