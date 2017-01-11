<?php

use Illuminate\Database\Seeder;
use App\Career;
class CareerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Career::create(['name'=>'Ingenieria Electrica']);
        Career::create(['name'=>'Ingenieria Electronica']);
        Career::create(['name'=>'Ingenieria Sistemas Computacionales']);
    }
}
