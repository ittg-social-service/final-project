<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// fake group
        DB::table('groups')->insert([
            'key' => str_random(10), //fake key
            'tutor_id' => 1, // fake tutor
            'period_id' => 1, 
            'coordinator_id' => 1, //fake coordinator
        ]);
    }
}
