<?php

use Illuminate\Database\Seeder;
use App\DepartmentManager;
class DepartmentManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DepartmentManager::create([
          'user_id'=>24,
        ]);
    }
}
