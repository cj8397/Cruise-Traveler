<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_messages', function (Blueprint $table) {

            $table->increments('id')->unique();
            //declare type first
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('event_id')->on('user_events');

            // declare type fist
            $table->string('user_id');
            $table->foreign('user_id')->references('user_id')->on('user_events');

            $table->string('message');
            $table->dateTime('timestamp');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('event_messages');
    }
}
