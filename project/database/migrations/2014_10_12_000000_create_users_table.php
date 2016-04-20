<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->string('id')->unique();
            $table->string('first');
            $table->string('last');
            $table->date('dob');
            $table->boolean('sex');
            $table->string('lang');
            $table->string('country');
            $table->string('password'); // hashed

            $table->date('created_at');
            $table->string('confirmation_code')->nullable(); // null once confirmed
            $table->rememberToken('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
