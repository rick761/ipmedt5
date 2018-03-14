<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToUserHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('userhistory',function( $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('ontvangen_signaal_id')->references('id')->on('ontvangensignalen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('userhistory',function( $table){
            $table->dropForeign(['user_id']);
            $table->dropForeign(['signaal_id']);
        });
    }
}
