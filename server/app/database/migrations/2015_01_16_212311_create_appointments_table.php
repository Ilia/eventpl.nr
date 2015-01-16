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
        $table->string('title');
        $table->string('location');
        $table->date('start_date');
        $table->time('start_time');
        $table->date('end_date');
        $table->time('end_time');
        $table->string('notes');
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
