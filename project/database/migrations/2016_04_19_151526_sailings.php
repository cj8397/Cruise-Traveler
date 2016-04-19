<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sailings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sailings', function (Blueprint $table) {

            $table->increments('id')->unique();
            $table->string('cruise_line');
            $table->datetime('start');
            $table->datetime('end');
            $table->string('origin');
            $table->string('destination');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sailings');
    }
}
