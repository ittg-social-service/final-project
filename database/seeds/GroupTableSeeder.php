<?php

use Illuminate\Database\Seeder;
use App\Group;
class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
          'key'=>'Grupo 01',
          'tutor_id'=>1,
          'period_id' =>1,
          'coordinator_id' => 1,

        ]);
        Group::create([
          'key'=>'Grupo 02',
          'tutor_id'=>2,
          'period_id' =>1,
          'coordinator_id' => 1,
        ]);
    }
}
