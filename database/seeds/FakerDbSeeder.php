<?php

use Illuminate\Database\Seeder;

class FakerDbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		
        $this->call(ActivityTableSeeder::class);

    }
}
