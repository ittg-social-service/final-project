<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['type'=>'estudiante']);
        Role::create(['type'=>'tutor']);
        Role::create(['type'=>'jefe de departamento']);
        Role::create(['type'=>'coordinador']);
    }
}
