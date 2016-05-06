<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {

            // declare type fist
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('first')->nullable();
            $table->string('last')->nullable();
            $table->date('dob')->nullable();
            $table->integer('age')->nullable();
            $table->boolean('sex')->nullable();
            $table->string('lang')->nullable();
            $table->string('country')->nullable();
            $table->string('ethinicity')->nullable();
            $table->string('hobby')->nullable();
            $table->boolean('family')->nullable();
            $table->string('region')->nullable(); // province or state
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->boolean('co_travellers')->nullable();
            $table->integer('two')->nullable();
            $table->integer('five')->nullable();
            $table->integer('twelve')->nullable();
            $table->integer('seventeen')->nullable();
            $table->integer('twentyfour')->nullable();
            $table->integer('twentynine')->nullable();
            $table->integer('thirtynine')->nullable();
            $table->integer('fourtynine')->nullable();
            $table->integer('fiftynine')->nullable();
            $table->integer('seventyfour')->nullable();
            $table->integer('seventyfive')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_details');
    }
}
