<?php

use Illuminate\Database\Seeder;

class CoordinatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coordinators')->insert([
            ['user_id' => 2], // fake coordinator
            ['user_id' => 5], //real coordinator
        ]);
    }
}
