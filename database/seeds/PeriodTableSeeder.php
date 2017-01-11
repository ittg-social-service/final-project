<?php

use Illuminate\Database\Seeder;
use App\Period;
class PeriodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Period::create([
          'period'=>'ENE-JUN',
          'year'=>'2016',
        ]);
        Period::create([
          'period'=>'AGO-DIC',
          'year'=>'2016',
        ]);
    }
}
