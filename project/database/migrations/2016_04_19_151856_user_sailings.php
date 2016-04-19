<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserSailings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_sailings', function (Blueprint $table) {

            //declare type first
            $table->integer('sailing_id')->unsigned();
            $table->foreign('sailing_id')->references('id')->on('sailings');

            // declare type fist
            $table->string('user_id');
            $table->foreign('user_id')->references('email')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_sailings');
    }
}
