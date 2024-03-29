<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserEvents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_events', function (Blueprint $table) {

            // declare type fist
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // declare type fist
            $table->integer('sailing_id')->unsigned();
            $table->foreign('sailing_id')->references('id')->on('sailings');

            //declare type first
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events');

            $table->string('role'); // only host or member

            $table->primary(['user_id', 'sailing_id', 'event_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_events');
    }
}
