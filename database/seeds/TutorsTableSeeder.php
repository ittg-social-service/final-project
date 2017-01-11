<?php

use Illuminate\Database\Seeder;

class TutorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// fake tutor
        DB::table('tutors')->insert([
            'user_id' => 3, //fake user tutor
            'department_manager_id' => 1 // fake department manager
        ]);
    }
}
