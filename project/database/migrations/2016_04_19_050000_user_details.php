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
            $table->integer('0-2')->nullable();
            $table->integer('3-5')->nullable();
            $table->integer('6-12')->nullable();
            $table->integer('13-17')->nullable();
            $table->integer('18-24')->nullable();
            $table->integer('25-29')->nullable();
            $table->integer('30-39')->nullable();
            $table->integer('40-49')->nullable();
            $table->integer('50-59')->nullable();
            $table->integer('60-74')->nullable();
            $table->integer('75+')->nullable();
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

