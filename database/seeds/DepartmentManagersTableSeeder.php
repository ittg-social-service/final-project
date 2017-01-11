<?php

use Illuminate\Database\Seeder;

class DepartmentManagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('department_managers')->insert([
            ['user_id' => 1], //fake  department manager
            ['user_id' => 4] // real department manager
        ]);
    }
}
