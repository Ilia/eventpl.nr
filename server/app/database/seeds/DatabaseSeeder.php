<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('CalendarsTableSeeder');
    $this->command->info('Calendar table seeded.');
	}

}
