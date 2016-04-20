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

            $table->string('ethinicity')->nullable();
            $table->string('hobby')->nullable();
            $table->boolean('family')->nullable();
            $table->integer('co_travellers')->nullable();
            $table->string('region')->nullable(); // province or state
            $table->string('city')->nullable();
            $table->string('address')->nullable();



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

