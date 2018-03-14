<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToQuizAntwoord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quizantwoorden',function( $table){
            $table->foreign('vraag_id')->references('id')->on('quizvragen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quizantwoorden',function( $table){
            $table->dropForeign(['vraag_id']);

        });
    }
}
