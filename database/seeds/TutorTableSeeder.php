<?php

use Illuminate\Database\Seeder;
use App\Tutor;
class TutorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=21; $i <=23 ; $i++) {
        Tutor::create([
          'user_id' => $i,
          'department_manager_id' => 1,
        ]);
      }
    }
}
