<?php

use Illuminate\Database\Seeder;
use App\Semester;
class SemesterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Semester::create([
        'number'=> 0,
      ]);
        Semester::create([
          'number'=> 1,
        ]);
        Semester::create([
          'number'=> 2,
        ]);
    }
}
