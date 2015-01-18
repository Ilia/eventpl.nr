<?php 

class CalendarsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('calendars')->delete();
    
        Calendar::create(array(
            'name' => 'Calendar 1'
        ));

        Calendar::create(array(
            'name' => 'Calendar 2'
        ));
    }    

}