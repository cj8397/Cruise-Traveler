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

            //declare type first
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events');

            // declare type fist
            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('role'); // only host or member

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
