<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Events extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {

            $table->increments('id')->unique();
            //declare type first
            $table->integer('sailing_id')->unsigned();
            $table->foreign('sailing_id')->references('id')->on('sailings');

            $table->string('title');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->string('desc');
            $table->string('location');
            $table->integer('max_participants')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
