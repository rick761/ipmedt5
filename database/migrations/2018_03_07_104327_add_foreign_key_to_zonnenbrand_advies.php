<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToZonnenbrandAdvies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('zonnenbrandadviezen',function( $table){
            $table->foreign('advies_id')->references('id')->on('adviezen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zonnenbrandadviezen',function( $table){
            $table->dropForeign(['advies_id']);
        });
    }
}
