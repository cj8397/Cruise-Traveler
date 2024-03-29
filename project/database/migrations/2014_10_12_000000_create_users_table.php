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

            $table->increments('id')->unique();
            $table->string('email')->unique();
            $table->string('password'); // hashed

            $table->date('created_at');
            $table->date('updated_at');
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
