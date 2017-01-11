<?php

use Illuminate\Database\Seeder;

class CareersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('careers')->insert([
            ['name' => str_random(10)],
            ['name' => 'Sistemas Computacionales'],
            ['name' => 'Electrica'],
            ['name' => 'Electronica'],
            ['name' => 'Quimica'],
            ['name' => 'Mecanica'],
            ['name' => 'Industrial'],
            ['name' => 'Gestion Empresarial']
        ]);
    
    }
}
