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
            $table->string('title');
            $table->string('cruise_line');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->string('port_org');
            $table->string('port_dest');
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
