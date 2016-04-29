<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SailingMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('sailing_messages', function (Blueprint $table) {

            $table->increments('id')->unique();
            //declare type first
            $table->integer('sailing_id')->unsigned();
            $table->foreign('sailing_id')->references('sailing_id')->on('user_sailings');

            // declare type fist
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('user_sailings');

            $table->string('message');
            $table->dateTime('timestamp');

        });
    }

    public function down()
    {
        Schema::drop('sailing_messages');
    }
}
