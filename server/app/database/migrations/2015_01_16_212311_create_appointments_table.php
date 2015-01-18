<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('appointments', function(Blueprint $table)
    {
        $table->increments('id');
        $table->integer('calendar_id');
        $table->foreign('calendar_id')->references('id')->on('calendars');
        $table->string('title');
        $table->datetime('start_datetime');
        $table->datetime('end_datetime');
        $table->string('location')->nullable();
        $table->string('notes')->nullable();
        $table->timestamps();
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('appointments');
	}

}
