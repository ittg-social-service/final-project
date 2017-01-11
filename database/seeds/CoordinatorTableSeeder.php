<?php

use Illuminate\Database\Seeder;
use App\Coordinator;
class CoordinatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coordinator::create([
          'user_id'=>25,
        ]);
    }
}
