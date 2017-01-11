<?php

use Illuminate\Database\Seeder;

class PeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periods')->insert([
          [
          	'period' => 'ENE-JUN',
          	'year' 	=>'2017'
          ],
          [
          	'period' => 'AGO-DIC',
          	'year' 	=>'2017'
          ]
          
        ]);
    }
}
